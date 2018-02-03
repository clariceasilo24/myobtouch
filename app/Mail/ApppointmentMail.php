<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message = ['id'];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->message['id'] = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@myobtouch.com', 'My OBTouch')
                    ->subject('You have an upcoming appointment!')
                    ->view('emails.appointment')->with('id', $this->message['id']);
    }
}
