<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\Mail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function store()
    {
        // $mail = new Mail();
    }


    public function sendMail(Request $request)
    {
        $userName = "Ulvy";
        Mail::to('ulvyromy156@gmail.com');
    }


    public function show(Mail $mail)
    {
        //
    }


    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
