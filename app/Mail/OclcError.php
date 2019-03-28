<?php

namespace App\Mail;

use App\Oclc\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OclcError extends Mailable
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
	 return $this->view('emails.oclc_error')
	           ->text('emails.oclc_error_plain');
    }
}
