<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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


    /* MENU */
    //Peserta
    public function index()
    {
        return view('dashboard.profile');
    }
    // Show the submit form.
    public function profile(User $profile)
    {
        return view('dashboard.profile',compact('profile'));
    }
    // Submit project link.
    public function update(Request $request, User $profile)
    {
        $request->validate([
            // 'nama'        => 'required',
            // 'email'       => 'required',
            // 'nowa'        => 'required',
            // 'alamat'      => 'required',
            // 'kota'        => 'required',
            // 'universitas' => 'required',
            // 'nim'         => 'required',
            // 'jurusan'     => 'required',
            // 'fakultas'    => 'required',
        ]);
    
        $profile->update($request->all());
    
        return back()->with('success','Profile Updated!');
    }
}
