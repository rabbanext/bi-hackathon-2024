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
        return view('dashboard.index', [
            'profile' => User::where('id', auth()->user()->id)->get()
        ]);
    }

    /* MENU */
    // Show the submit form.
    public function submit(User $post)
    {
        $count = User::all();

        $members = User::where('id', auth()->user()->id)->get();
        $count = User::where('id', auth()->user()->id)
            ->whereNotNull('member_name')
            ->selectRaw('COALESCE(SUM(JSON_LENGTH(member_role)), 0) as total_count')
            ->first()
            ->total_count;

        return view('dashboard.submit', compact('post', 'members', 'count'));
    }

    // Submit project link.
    public function update(Request $request, User $post)
    {
        if ($request->hasFile('project_file')) {
            $file = $request->file('project_file');
            $originalFileName = $file->getClientOriginalName();
            $teamName = str_replace(' ', '_', Auth::user()->team_name);
            $dateTime = date('Ymd_His');
            $fileName = $teamName . '_' . $dateTime . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public'), $fileName);
            Auth::user()->project_file = $fileName;
        }

        // Update other fields
        Auth::user()->update($request->except('project_file')); // Exclude 'project_file' from mass assignment

        return back()->with('success', 'Submitted!');
    }

    //Admin
    public function projects()
    {
        return view('dashboard.projects', [
            'projects' => User::whereNotNull('project_link')->get()

        ]);
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
