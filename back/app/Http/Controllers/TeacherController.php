<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Accepted;
use Illuminate\Http\Request;

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
        $cher->address = $request->address;
        $cher->email = $request->email;
        $cher->gender = $request->gender;
        $cher->img = $request->file('img')->store('public/images');
        $cher->birth_day = $request->birth_day;
        $cher->password = $request->password;
        $cher->save();
        return response()->json(['message' => "Item saved successfully"]);
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
        $cher = Teacher::findOrFail($id);
        $cher->first_name = $request->first_name;
        $cher->last_name = $request->last_name;
        $cher->address = $request->address;
        $cher->email = $request->email;
        $cher->gender = $request->gender;
        $cher->img = $request->file('img')->store('public/images');
        $cher->birth_day = $request->birth_day;
        $cher->password = $request->password;
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
        $accepted = Accepted::findOrFail($id);
        $accepted->allow = $request->allow;
        $accepted->save();
    }

    public function getAllEmails ()
    {
        return Teacher::all(['email']);
    }
}
