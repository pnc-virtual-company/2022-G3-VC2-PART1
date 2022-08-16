<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::get();
    }

    public function store(Request $request)
    {
        $std = new Student();
        $std->first_name = $request->first_name;
        $std->last_name = $request->last_name;
        $std->class = $request->class;
        $std->address = $request->address;
        $std->email = $request->email;
        $std->img = $request->file('img')->store('public/images');
        $std->birth_day = $request-> birth_day;
        $std->gender = $request->gender;
        $std->password = $request->password;
        $std->save();
        return response()->json(['message' => 'added']);
    }
    public function show( $id)
    {
        $result = ['message' => "Item not found"];
        if (Student::find($id)) {
            $result = Student::find($id);
        }
        return $result;
    }

    public function update(Request $request,  $id)
    {
        $std = Student::findOrFail($id);
        $std->first_name = $request->first_name;
        $std->last_name = $request->last_name;
        $std->class = $request->class;
        $std->address = $request->address;
        $std->email = $request->email;
        $std->gender = $request->gender;
        $std->img = $request->file('img')->store('public/images');
        $std->birth_day = $request->birth_day;
        $std->password = $request->password;
        $std->update();
        return response()->json(['message' => 'items updated']);
    }

    public function destroy($id)
    {
        $result = ['message' => "Item remove successfully"];
        if (!Student::destroy($id)) {
            $result = ['message' => "Item not found"];

        }
        return $result;
    }

    public function getReqStudent($id)
    {
        return Student::with(['dayOff','approve'])->where('id','=',$id)->get();

    }

    public function countStudentReq($id)
    {
        return Student::withCount(['dayOff'])->where('id','=',$id)->get();
    }

    public function approved($allow)
    {
        return Student::with(['approve'])->get();
    }


    public function img(Request $request,$id)
    {
        $std = Student::findOrFail($id);
        $std->img = $request->img;
        $std->update();
        return response()->json(['message' =>'items updated']);
    }
}
