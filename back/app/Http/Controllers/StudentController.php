<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Accepted;
// use App\Models\StudentRequest;
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
        $std->role = $request->role;

        $name = $request->file('img')->getClientOriginalName();
        $newName = time() . $name;
        $std->img = $request->file('img')->storeAs('public/images', $newName);
        $std['img'] = URL('storage/images/' . $newName);
        // $post->save();

        // return response()->json(['massage' => "Upload successfully"]);
        $std->birth_day = $request-> birth_day;
        $std->gender = $request->gender;
        $std->password = bcrypt($request->password);
        $std->save();
        $token = $std->createToken('mytoken')->plainTextToken;
            $response = [
                'user' => $std,
                'token' => $token
            ];
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
        $std->role = $request->role;
        $std->address = $request->address;
        $std->email = $request->email;
        $std->gender = $request->gender;
        $name = $request->file('img')->getClientOriginalName();
        $newName = time() . $name;
        $std->img = $request->file('img')->storeAs('public/images', $newName);
        $std['img'] = URL('storage/images/' . $newName);
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

    public function approved($allow,$student_id)
    {
        return Accepted::where('allow', '=', strtoupper($allow))->where('student_id','=',$student_id)->get();
    }


    public function img(Request $request,$id)
    {
        $std = Student::findOrFail($id);
        $name = $request->file('img')->getClientOriginalName();
        $newName = time() . $name;
        $std->img = $request->file('img')->storeAs('public/images', $newName);
        $std['img'] = URL('storage/images/' . $newName);
        $std->update();
        return response()->json(['message' =>'items updated']);
    }

    

}
