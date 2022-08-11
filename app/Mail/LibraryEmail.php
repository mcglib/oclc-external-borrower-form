<?php

namespace App\Mail;

use App\Oclc\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class LibraryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrower;
    public $url;
    public $timestamp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrower $borrower)
    {
        //
        $this->borrower = $borrower;
        $this->url = "https:";
        $this->timestamp = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $_ENV['MAIL_ERROR_SUBJECT'] ?? 'External borrowers: Error creating patron record';
        return $this->view('emails.library')
            ->text('emails.library_plain')
            ->subject($subject)
            ->with("borrower", $this->borrower);
    }
}