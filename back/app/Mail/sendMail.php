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

    public function __construct($body)
    {
         foreach ($body as $x => $val) {
             $this->$x = $val;
        }
    }

    public function build()
    {
        return $this->from("ulvyromy156@gamail.com")->subject("Day off")->view('sends.send')
        ->with([
            'username' => $this->username,
            'details' => $this->details,
            'leaveType' => $this->leaveType,
            'email' => $this->email,
<<<<<<< HEAD
=======
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'days' => $this->days
>>>>>>> 3a7dcb8a6c661fb72e887d8aa3395a9ea7ea0bbf
        ]);
    }
}
