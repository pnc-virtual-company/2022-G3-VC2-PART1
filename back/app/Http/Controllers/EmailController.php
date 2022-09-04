<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Mail\mailToStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\StudentRequest;
use App\Mail\updatePassword;
use Illuminate\Support\Facades\Crypt;
use App\Mail\forgotPassword;


class EmailController extends Controller
{
    public function sendMail($id,$leaveType,$message)
    {
        $emails = Teacher::all(['email']);
        $studentRequest = StudentRequest::find($id);
        $student = Student::find($id);
        $username = $student['first_name'].' '.$student['last_name'];
        $msg = $message;
        $email = $student['email'];
        $days = (int)date('d', strtotime($student['start_date'])) - (int)date('d', strtotime($student['end_date']));
        $start_date = date('y-m-d', strtotime($student['start_date']));
        $end_date = date('y-m-d', strtotime($student['end_date']));
        if($days  == 0){
            $days = 'Half';
        }
        $body = [
            'username' => $username,
            'details' => $msg,
            'leaveType' => $leaveType,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'email' => $email,
            'days' => $days,
        ];

        foreach ($emails as $eml) {
            Mail::to($eml)->send(new sendMail($body));//file in Mail folder
        }

    }

    public function mailToStudent($id, $status)
    {
        $studentRequest = StudentRequest::find($id);
        $student = Student::find($studentRequest['student_id']);
        $username = $student['first_name'] . ' ' . $student['last_name'];
        $email = $student['email'];
        $studentRequest['status'] = $status;
        $body = [
            'username' => $username,
            'status' => $status,
        ];

        Mail::to($email)->send(new mailToStudent($body)); //file in Mail folder
        return 'success';

    }

    public function updatePasswordTeacher($id)
    {
        $teacher = Teacher::find($id);
        $username = $teacher['first_name'] . ' ' . $teacher['last_name'];
        $email = $teacher['email'];
        $psw = ($teacher['password']);
        $body = [
            'username' => $username,
            'psw' =>$psw
        ];

        Mail::to($email)->send(new updatePassword($body)); //file in Mail folder
        return 'success';

    }

    public function updatePasswordStudent($id)
    {
        $student = Student::find($id);
        $username = $student['first_name'] . ' ' . $student['last_name'];
        $email = $student['email'];
        $psw = ($student['password']);
        $body = [
            'username' => $username,
            'psw' => $psw
        ];

        Mail::to($email)->send(new updatePassword($body)); //file in Mail folder
        return 'success';

    }

    public function forgotPasswordTeacher($email)
    {
        $teacher = Teacher::where('email', '=', $email)->first();
        $username = $teacher['first_name'] . ' ' . $teacher['last_name'];
        $email = $teacher['email'];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHI!@#$JKLMNOP$!QRSTUVWXYZ';
        $psw = '';
        for ($i = 0; $i < 10; $i++) {
            $psw .= $characters[rand(0, strlen($characters)-1)];
        }
        $body = [
            'username' => $username,
            'code' => $psw
        ];
        Mail::to($email)->send(new forgotPassword($body)); //file in Mail folder
        if($teacher){
            return response()->json(['message' => 'success','code'=>$psw,'id'=>$teacher['id']]);
        }else{
            return response()->json(['message' => 'email not found!']);
        }

    }

    public function forgotPasswordStudent($email)
    {
        $student = Student::where('email','=',$email)->first();
        $username = $student['first_name'] . ' ' . $student['last_name'];
        $email = $student['email'];
        $characters = '012345678&!3#9abcdefghijklmno!#$@pqrstuvwxyzABCDEFG@#$!HIJKLMNOPQRSTUVWXYZ';
        $psw = '';
        for ($i = 0; $i < 10; $i++) {
            $psw .= $characters[rand(0, strlen($characters)-1)];
        }
        $body = [
            'username' => $username,
            'code' => $psw
        ];

        Mail::to($email)->send(new forgotPassword($body)); //file in Mail folder
        if ($student) {
            return response()->json(['message' => 'success','code' => $psw,'id'=>$student['id']]);
        }
        else {
            return response()->json(['message' => 'email not found!']);
        }

    }
}
