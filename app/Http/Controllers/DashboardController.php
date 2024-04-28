<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    // Validate the form data
    $validatedData = $request->validate([
        // Validation rules for other fields...
    ]);

    // Update the user's data
    $user->update($validatedData);

    if (empty($validatedData['member_name'])) {
        $user->update([
            'member_name' => null,
            'member_role' => null,
            'member_domicile' => null,
            'member_email' => null,
            'member_date_of_birth' => null,
            'member_profession' => null,
        ]);
    }
    if (empty($validatedData['project_link'])) {
        $user->update([
            'project_link' => null,
            'project_desc' => null,
        ]);
    }
    if ($request->hasFile('project_file')) {
        $file = $request->file('project_file');
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $originalFileName = str_replace(' ', '_', $originalFileName);
        $teamName = str_replace(' ', '_', Auth::user()->team_name);
        $dateTime = date('Ymd_His');
        $extension = $file->getClientOriginalExtension();
        $fileName = $originalFileName . '_' . $teamName . '_' . $dateTime . '.' . $extension;
        $file->move(storage_path('app/public'), $fileName);
        Auth::user()->project_file = $fileName;
    }    

    // Update other fields
    Auth::user()->update($request->except('project_file')); // Exclude 'project_file' from mass assignment

    return back()->with('success', 'Form Submitted!');
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

    //Super Admin
    public function admins()
    {
        return view('dashboard.admins', [
            'admins' => User::where('type', 1)->get()
        ]);
    }
}
