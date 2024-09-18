<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DownloadRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $envanto_url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $envanto_url)
    {
        $this->email = $email;
        $this->envanto_url = $envanto_url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Download Request Submitted')
                    ->view('emails.download_request_notification');
    }
}
