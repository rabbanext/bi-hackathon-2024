<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailWithButtons;

class EmailController extends Controller
{
    // // handle email response
    // public function handleResponse(Request $request) {
    //     $email = $request->input('email');
    //     $response = $request->input('response');
    
    //     $user = User::where('email', $email)->first();
    
    //     if ($user) {
    //         $user->email_response = $response;
    //         $user->email_response_timestamp = Carbon::now();
    //         $user->save();
    //     }
    
    //     return redirect()->route('thanks');
    // }

    // handle whatsapp response
    public function handleResponse(Request $request, $response, $email) {
        $user = User::where('email', $email)->first();
    
        if ($user) {
            $user->wa_response = $response;
            $user->wa_response_timestamp = Carbon::now();
            $user->save();
        }

        return redirect()->route('thanks');
    }

    public function sendEmails() {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new EmailWithButtons($user->email));
        }
    }
}
