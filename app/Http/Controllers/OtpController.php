<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OtpLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        
        $phoneNumber = $user->nowa;
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 1) === '8') {
            $phoneNumber = '62' . $phoneNumber;
        }

        // Send OTP using cURL
        $appId = env('QISCUS_APP_ID');
        $secretKey = env('QISCUS_SECRET_KEY');
        $channelId = env('QISCUS_CHANNEL_ID');
        $baseUrl = env('QISCUS_APP_URL');
        $endpoint = $baseUrl . '/' . $appId . '/' . $channelId . '/messages';
        // https://omnichannel.qiscus.com/whatsapp/v1/{{APP-ID}/{{channel-id}}/messages

        Log::info('endpoint: ' . $endpoint);


        $response = Http::withHeaders([
            'Qiscus-App-Id' => $appId,
            'Qiscus-Secret-Key' => $secretKey,
            'Content-Type' => 'application/json',
        ])->post(
            $endpoint, [
            'to' => $phoneNumber,
            'type' => 'template',
            'template' => [
                'namespace' => '2bd879c5_b17c_48b6_8611_aa2a6595d39c',
                'name' => 'hackathon_otp',
                'language' => [
                    'policy' => 'deterministic',
                    'code' => 'id',
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

        // Log the OTP response
        OtpLog::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'phone_number' => $phoneNumber,
            'status' => $response->status(),
            'response' => $response->body(),
        ]);

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'A new OTP sent successfully to ');
    }
}
