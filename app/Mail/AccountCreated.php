<?php

namespace App\Mail;

use App\Oclc\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $borrower;
    public $name = "";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Borrower $borrower)
    {
	    //
	    $this->borrower = $borrower;
	    $this->name = "Myname";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	  return $this->view('emails.borrower')
		  ->text('emails.borrower_plain')
		  ->with(['name' => $this->name]);
    }
}
