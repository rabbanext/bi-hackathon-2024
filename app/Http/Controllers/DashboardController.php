<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SubmissionConfirmation;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    //Homelanding
    public function superAdminHome()
    {
        return view('dashboard.index');
    }
    public function adminHome()
    {
        return view('dashboard.index');
    }
    public function home()
    {
        return view('dashboard.profile', [
            'profile' => User::where('id', auth()->user()->id)->get()
        ]);
    }

    /* MENU */
    // Show the submit form.
    public function submit(User $post)
    {
        $count = User::all();

        $members = User::where('id', auth()->user()->id)->get();
        $countMember = User::where('id', auth()->user()->id)
            ->whereNotNull('member_name')
            ->selectRaw('COALESCE(SUM(JSON_LENGTH(member_role)), 0) as total_count')
            ->first()
            ->total_count;
        $countLink = User::where('id', auth()->user()->id)
            ->whereNotNull('project_link')
            ->selectRaw('COALESCE(SUM(JSON_LENGTH(project_link)), 0) as total_count')
            ->first()
            ->total_count;

        return view('dashboard.submit', compact('post', 'members', 'countMember', 'countLink'));
    }

    // Submit
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $messages = [
            'member_name.*' => 'The Member Name field is required.',
            'member_role.*' => 'The Member Role field is required.',
            'member_domicile.*' => 'The Member Domicile field is required.',
            'member_email.*' => 'The Member Email field is required.',
            'member_date_of_birth.*' => 'The Member Date of Birth field is required.',
            'member_profession.*' => 'The Member Profession field is required.',
            'project_link.*' => 'The Project Link field is required.',
            'project_desc.*' => 'The Project Desc field is required.',
            'project_file.max' => 'The project file must not be greater than 50MB.',
        ];
        
        $validatedData = $request->validate([
            'team_name' => 'required|string|max:255',
            'submit_for' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'member_name.*' => 'required|string|max:255',
            'member_role.*' => 'required|in:leader,member',
            'member_domicile.*' => 'required|string|max:255',
            'member_email.*' => 'required|email|max:255',
            'member_date_of_birth.*' => 'required|date',
            'member_profession.*' => 'required|string|max:255',
            'member_github_url.*' => 'nullable|string|max:255',
            'member_linkedin_url.*' => 'nullable|string|max:255',
            'project_link.*' => 'nullable|string|max:255',
            'project_desc.*' => 'nullable|string|max:255',
            'project_file' => 'nullable|file|mimes:pdf|max:51200', // 50 MB
            'submitted' => 'nullable',
        ], $messages);

        // Update the user's data based on the validated fields

        // // Logs the validated data for debugging
        // \Log::info('Validated Data: ', $validatedData);

        $user->update(array_filter($validatedData));

        // Handle special cases where specific fields need to be nullified if empty
        if (empty($validatedData['member_name'])) {
            $user->member_name = null;
            $user->member_role = null;
            $user->member_domicile = null;
            $user->member_email = null;
            $user->member_date_of_birth = null;
            $user->member_profession = null;
        }

        if (empty($validatedData['project_link'])) {
            $user->project_link = null;
            $user->project_desc = null;
        }

        // Handle file upload if a new file is provided
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $originalFileName = str_replace(' ', '_', $originalFileName);
            $teamName = str_replace(' ', '_', Auth::user()->team_name);
            $dateTime = date('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $fileName = $originalFileName . '_' . $dateTime . '.' . $extension;

            $storagePath = ($request->input('submitted') == 1) ? 'submitted' : 'save';
            $file->move(storage_path('app/public/' . $storagePath), $fileName);

            $user->project_file = $fileName;

            // Notify user after file upload
            $user->notify(new SubmissionConfirmation());
        }

        // Move the existing file from 'save' to 'submitted' if submitted is true and project_file is not empty
        if ($request->has('submitted') && $request->input('submitted') == 1 && !empty($user->project_file)) {
            $oldPath = storage_path('app/public/save/' . $user->project_file);
            $newPath = storage_path('app/public/submitted/' . $user->project_file);
            if (file_exists($oldPath)) {
                rename($oldPath, $newPath);
                $user->project_file = $user->project_file;
            }
        }

        // Save the changes
        $user->save();

        if ($request->has('submitted') && $request->input('submitted') == 1) {
            return back();
        } else {
            return redirect()->back()->with('success', '<strong>Form saved successfully!</strong> Feel free to edit and make any final adjustments before submission.');
        }
    }
    
    public function exportUsers(Request $request)
    {
        $filters = $request->only([
            'project_file',
            'submitted',
            'email_verified',
            'otp_verified'
        ]);

        // mapping the filters to match with query
        $mappedFilters = [];
        if ($filters['project_file']) {
            $mappedFilters['project-file-filter'] = $filters['project_file'];
        }
        if ($filters['submitted']) {
            $mappedFilters['submitted-filter'] = $filters['submitted'];
        }
        if ($filters['email_verified']) {
            $mappedFilters['email-verified-filter'] = $filters['email_verified'];
        }
        if ($filters['otp_verified']) {
            $mappedFilters['otp-verified-filter'] = $filters['otp_verified'];
        }
        return Excel::download(new UsersExport($mappedFilters), 'users.xlsx');
    }

    //Admin
    public function projects()
    {
        $projects = User::whereNotNull('project_file')->get();

        return view('dashboard.projects', ['projects' => $projects]);
    }
    public function users()
    {
        return view('dashboard.users', [
            'users' => User::where('type', 0)->get()
        ]);
    }
    public function email_responses()
    {
        return view('dashboard.email_responses', [
            'users' => User::where('type', 0)->get()
        ]);
    }
    public function wa_responses()
    {
        return view('dashboard.wa_responses', [
            'users' => User::where('type', 0)->get()
        ]);
    }

    //Super Admin
    public function admins()
    {
        return view('dashboard.admins', [
            'admins' => User::where('type', 1)->get()
        ]);
    }
}
