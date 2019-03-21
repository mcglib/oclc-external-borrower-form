<?php

namespace App\Mail;

use App\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LibraryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrower;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrower $borrower)
    {
        //
	 $this->borrower = $borrower;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	  return $this->view('emails.library')
	              ->text('emails.library_plain');
    }
}
