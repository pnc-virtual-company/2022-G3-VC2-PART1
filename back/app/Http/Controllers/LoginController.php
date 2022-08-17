<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //log in
    // public function register(Request $request)
    // {
    //     $user = new Login();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     $token = $user->createToken('mytoken')->plainTextToken;
    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];
    //     return response()->json($response);
    // }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['mas' => "Invalid"]);
        }
        $user = Auth::user();
        $token = $user->createToken('mytoken')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response()->json(['mas' => 'success', 'token' => $token], 200)->withCookie($cookie);
    }
    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['mes' => 'Logged out Successfully'])->withCookie($cookie);
    }
}
