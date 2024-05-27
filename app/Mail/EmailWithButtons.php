<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailWithButtons extends Mailable
{
    use Queueable, SerializesModels;

    public $yesUrl;
    public $noUrl;
    public $maybeUrl;
    public $userEmail; // Add this property

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userEmail) // Update the constructor
    {
        $this->userEmail = $userEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $yesUrl = route('handle-response', ['email' => $this->userEmail, 'response' => 'yes']);
        $noUrl = route('handle-response', ['email' => $this->userEmail, 'response' => 'no']);
        $maybeUrl = route('handle-response', ['email' => $this->userEmail, 'response' => 'maybe']);
        
        return $this->view('emails.email-with-buttons')
                    ->with([
                        'yesUrl' => $yesUrl,
                        'noUrl' => $noUrl,
                        'maybeUrl' => $maybeUrl,
                    ]);
    }
}
