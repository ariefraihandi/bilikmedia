<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DownloadNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $downloadUrl;

    public function __construct($title, $downloadUrl)
    {
        $this->title = $title;
        $this->downloadUrl = $downloadUrl;
    }

    public function build()
    {
        return $this->subject('Your Download is Ready: ' . $this->title)
                    ->view('emails.downloadReady')
                    ->with([
                        'title' => $this->title,
                        'downloadUrl' => $this->downloadUrl,
                    ]);
    }
}
