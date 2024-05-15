<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verify-wa');
    }

    public function verify(Request $request)
    {
        // Validate the OTP and phone number
        $validatedData = $request->validate([
            'nowa' => 'required|string',
            'otp' => 'required|string',
        ]);
        
        // Find the user by phone number
        $user = User::where('nowa', $validatedData['nowa'])->first();

        // Check if the user exists
        if (!$user) {
            return redirect()->back()
                ->withError('User not found.');
        }

        // Check if the OTP matches
        else if (trim($user->otp) !== trim($validatedData['otp'])) {
            return redirect()->back()
                ->withError('Invalid OTP.');
        }

        // Check if the OTP is expired
        else if ($user->otp_expiry < now()) {
            return redirect()->back()
                ->withError('OTP expired. Please request a new one.');
        }
        else{

        // Mark OTP as verified and save the timestamp
        $user->otp_verified_at = now();
        $user->save();

        // Redirect to profile page or any other desired destination
        return redirect()->route('submit')->with('success', 'OTP verified successfully!');
    }
    }

    public function resendOtp()
    {
        $user = Auth::user();

        // Generate new OTP
        $otp = random_int(100000, 999999);

        // Store new OTP in the database
        $user->otp = $otp;
        $user->otp_expiry = now()->addMinutes(10080); // Set OTP expiry time to 7 days
        $user->save();
        
        // Adjust phone number if necessary
        $phoneNumber = $user->nowa;
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 1) === '8') {
            $phoneNumber = '62' . $phoneNumber;
        }

        // Send OTP using cURL
        $response = Http::withHeaders([
            'Qiscus-App-Id' => 'kczge-jxbshhqmilt7vym',
            'Qiscus-Secret-Key' => '7fb55cc85793cee7396e792e8e674241',
            'Content-Type' => 'application/json',
        ])->post('https://omnichannel.qiscus.com/whatsapp/v1/kczge-jxbshhqmilt7vym/5162/messages', [
            'to' => $phoneNumber,
            'type' => 'template',
            'template' => [
                'namespace' => 'e66eee30_b2bd_4b7e_a393_e17169666559',
                'name' => 'register_otp',
                'language' => [
                    'policy' => 'deterministic',
                    'code' => 'en',
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $otp,
                            ],
                        ],
                    ],
                    [
                        'type' => 'button',
                        'sub_type' => 'url',
                        'index' => '0',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $otp,
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'A new OTP sent successfully to ');
    }
}
