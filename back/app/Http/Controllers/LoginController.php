<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

    public function login(Request $request) {
        $user = Student::where('email', $request->email)->first();  
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json(['sms'=>"Invaliid password"]);
        }

        $token = $user->createToken('mytoken')->plainTextToken;
        $cookie = cookie('jwt', $token, 60*24);
 
        return response()->json(['mas'=> 'success','token'=>$token], 200)->withCookie($cookie);
     }
 
     public function logout() {
         $cookie = Cookie::forget('jwt');
         return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie);
     }
}