<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\RequestDownload;

class FixUrlNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $download;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RequestDownload $download)
    {
        $this->download = $download;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Request Download Update')->view('emails.fixUrlNotification');
    }
}
