<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line at the top
use Illuminate\Support\Facades\Storage; // Add this line at the top

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
    //Peserta
    // public function profile()
    // {
    //     return view('dashboard.profile');
    // }
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

            // Rename the file if it contains spaces
            $fileName = str_replace(' ', '_', $originalFileName);

            // Save the file name to the database
            Auth::user()->update(['project_file' => $fileName]); // Assuming 'project_file' is the field in your database to store the file name
            
            // Move the uploaded file to the desired location with the new filename
            $file->move(storage_path('app/project_files'), $fileName);
        }

        // Update other fields if needed
        Auth::user()->update($request->except('project_file')); // Exclude 'project_file' from mass assignment

        return back()->with('success', 'Submitted!');
    }

/////
    // // Show the profile form.
    // public function editprof(User $ngen)
    // {
    //     return view('dashboard.editprof',compact('ngen'));
    // }
    // // Edit profile link.
    // public function edit(Request $request, User $ngen)
    // {
    //     $request->validate([
    //         'fakultas' => 'required',
    //         'jurusan' => 'required',
    //     ]);
    
    //     $ngen->edit($request->all());
    
    //     return back()->with('success','Submitted!');
    // }



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
