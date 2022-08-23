<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Email;
class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userEmail;
    public function __construct($body)
    {
         foreach ($body as $x => $val) {
             $this->$x = $val;
        }
    }

    public function build()
    {
        return $this->from($this->email)->subject("Day off")->view('sends.send')
        ->with([
            'username' => $this->username,
            'details' => $this->details,
            'leaveType' => $this->leaveType,
            'email' => $this->email,
        ]);
    }
}
