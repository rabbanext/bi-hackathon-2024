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

    // Submit project link.
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $messages = [
            'project_file.max' => 'The project file must not be greater than 50MB.',
        ];
        $validatedData = $request->validate([
            'team_name' => 'required|string|max:255',
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
            // Logic for handling file upload
            $file = $request->file('project_file');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $originalFileName = str_replace(' ', '_', $originalFileName);
            $teamName = str_replace(' ', '_', Auth::user()->team_name);
            $dateTime = date('Ymd_His');
            $extension = $file->getClientOriginalExtension();
            $fileName = $originalFileName . '_' . $dateTime . '.' . $extension;
            $file->move(storage_path('app/public'), $fileName);
            $user->project_file = $fileName;
    
            // Notify user after file upload
            $user->notify(new SubmissionConfirmation());
        }
    
        // Save the changes
        $user->save();
    
        // Redirect back with success message
        if (!$request->filled('submitted')) {
            return back()->with('success', '<strong>Form saved successfully!</strong> Feel free to edit and make any final adjustments before submission.');
        } else {
            return back();
        }
    }
    
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
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

    //Super Admin
    public function admins()
    {
        return view('dashboard.admins', [
            'admins' => User::where('type', 1)->get()
        ]);
    }
}
