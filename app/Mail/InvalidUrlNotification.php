<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvalidUrlNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $url;
    public $fixUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $url)
    {
        $this->email = $email;
        $this->url = $url;
        $this->fixUrl = route('show.downloadHistory'); // Menggunakan helper route untuk mendapatkan URL lengkap
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invalid_url_notification')
                    ->subject('Invalid URL Notification')
                    ->with([
                        'email' => $this->email,
                        'url' => $this->url,
                        'fixUrl' => $this->fixUrl,
                    ]);
    }
}
