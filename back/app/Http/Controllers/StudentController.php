<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class StudentController extends Controller
{
    public function index()
    {
        return Student::get();
    }

    public function store(Request $request)
    {
        $request -> validate([
            'email' => 'string|required|email|unique:users',
        ]); 
        $std = new Student();
        $std->first_name = $request->first_name;
        $std->last_name = $request->last_name;
        $std->class = $request->class;
        $std->address = $request->address;
        $std->email = $request->email;

        $name = $request->file('img')->getClientOriginalName();
        $newName = time() . $name;
        $std->img = $request->file('img')->storeAs('public/images',$newName);
        $std['img']=URL('storage/images/'.$newName);

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
        $request -> validate([
            'email' => 'string|required|email|unique:users',
        ]); 
        $std = Student::findOrFail($id);

        // delete old image
        $link_img = substr($std['img'],22);
        if( File::exists(public_path($link_img)) ) {
            File::delete(public_path($link_img));
        }

        $std->first_name = $request->first_name;
        $std->last_name = $request->last_name;
        $std->class = $request->class;
        $std->address = $request->address;
        $std->email = $request->email;
        $std->gender = $request->gender;

        // add new image
        $name = $request->file('img')->getClientOriginalName();
        $newName = time() . $name;
        $std->img = $request->file('img')->storeAs('public/images',$newName);
        $std['img']=URL('storage/images/'.$newName);

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
