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

    public function login(Request $request)
    {
        $user = Student::where('email', $request->email)->first();
        //check password
        if(!$user || !!Hash::check($user->password,$user->password)){
            return response()->json(['sms'=>"Invaliid password"]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($response);
    } 
    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['mes' => 'Logged out Successfully'])->withCookie($cookie);
    }
}
