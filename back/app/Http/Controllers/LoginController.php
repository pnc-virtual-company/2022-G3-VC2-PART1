<?php
namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{

    public function studentLogin(Request $request)
    {
        $user = Student::where('email', $request->email)->first();
        //check password
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json(['sms'=>"Invaliid password"]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        // $cookie = cookie('jwt', $token, 60*24*30);
        return response()->json(['token' => $token,'message'=>'success login','id'=>$user['id']],200);

    }


    public function teacherLogin(Request $request)
    {
        $user = Teacher::where('email', $request->email)->first();
        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['sms' => "Invaliid password"]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        // $cookie = cookie('jwt', $token, 60*24*30);
        return response()->json(['token' => $token,'message'=>'success login','id'=>$user['id']],200);

    }

    public function logout() {
        $cookie = Cookie::forget('jwt');
        return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie);
    }

}



