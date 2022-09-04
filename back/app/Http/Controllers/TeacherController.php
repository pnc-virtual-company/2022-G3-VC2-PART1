<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Accepted;
use App\Models\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::all();
    }

    public function store(Request $request)
    {
        $cher = new Teacher();
        $cher->first_name = $request->first_name;
        $cher->last_name = $request->last_name;
        $cher->gender = $request->gender;
        $cher->email = $request->email;
        $cher->phone = $request->phone;
        $cher->password = bcrypt($request->password);
        $cher->save();
        $token = $cher->createToken('mytoken')->plainTextToken;
        $response = [
            'user' => $cher,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function show($id)
    {
        $result = ['message' => "Item not found"];
        if (Teacher::find($id)) {
            $result = Teacher::find($id);
        }
        return $result;
    }
    public function update(Request $request, $id)
    {
        $cher = new Teacher();
        $cher->first_name = $request->first_name;
        $cher->last_name = $request->last_name;
        $cher->gender = $request->gender;
        $cher->email = $request->email;
        $cher->phone = $request->phone;
        $cher->password = bcrypt($request->password);
        $cher->update();
        return response()->json(['message' => 'items updated']);
    }
    public function destroy($id)
    {
        $result = ['message' => "Item remove successfully"];
        if (!Teacher::destroy($id)) {
            $result = ['message' => "Item not found"];

        }
        return $result;
    }

    public function approve(Request $request,$id)
    {

        $studReq = StudentRequest::findOrFail($id);
        $studReq->status = $request->status;
        $studReq->update();
        return response()->json(['message' => 'updated']);
    }

    public function getAllEmails ()
    {
        return Teacher::all(['email']);
    }

    public function resetPassword(Request $request, $id)
    {
        $teacher =  Teacher::findOrFail($id);
        if(Hash::check($request->password,$teacher['password']))
        {
            $teacher->password = bcrypt($request->new_password);
            $teacher->save();
            return response()->json(['success' => 'Password updated!',],201);
        }
        return response()->json(['success' => 'Password incorrect!'], 404);

    }

    public function forgotPassword(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->password = bcrypt($request->new_password);
        $teacher->update();
        return response()->json(['success' => 'Password updated!'], 201);
    }


}
