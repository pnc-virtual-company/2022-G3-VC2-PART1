<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function sendMail($subject,$message,$emails)
    {
        $sbj = $subject;
        $msg = $message;
        $body = [
            'sbj' => $sbj,
            'msg' => $msg,
        ];
        $emails =array ('ronalkot7@gmail.com', 'ulvy.romy@student.passerellesnumeriques.org','thibtik1234@gmail.com');
        foreach ($emails as $email) {
            Mail::to($email)->send(new sendMail($body));//file in Mail folder
        }

    }
}
