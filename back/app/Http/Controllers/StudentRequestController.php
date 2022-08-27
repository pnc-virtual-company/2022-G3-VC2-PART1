<?php

namespace App\Http\Controllers;

use App\Models\StudentRequest;
use Illuminate\Http\Request;

class StudentRequestController extends Controller
{
    public function index()
    {
        return StudentRequest::with('student')->get();

    }
    public function get_padding()
    {
        return StudentRequest::with('student')->where('status','padding')->get();

    }

    public function store(Request $request)
    {
        $req = new StudentRequest();
        $req->student_id = $request->student_id;
        $req->start_date = $request->start_date;
        $req->end_date = $request->end_date;
        $req->reason = $request->reason;
        $req->duration = $request->duration;
        $req->status = $request->status;

        // $req->status = strtoupper($request->status);
        $req->leave_type = $request->leave_type;
        $req->save();
        return response()->json(['message' => "Item saved successfully"]);
    }

    public function show($id)
    {
        $result = ['message' => "Item not found"];
        if (StudentRequest::find($id)) {
            $result = StudentRequest::find($id);
        }
        return $result;
    }

    public function update(Request $request, $id)
    {
        $req = StudentRequest::findOrFail($id);
        $req->student_id = $request->student_id;
        $req->start_date = $request->start_date;
        $req->end_date = $request->end_date;
        $req->reason = $request->reason;
        $req->status = strtoupper($request->status);
        $req->duration = $request->duration;
        $req->leave_type = $request->leave_type;
        $req->update();
        return response()->json(['message' => 'items updated']);
    }
    public function update_status(Request $request, $id)
    {
        $req = StudentRequest::find($id);
        $req->status = $request->status;
        $req->save();
        return response()->json(['message' => 'status updated']);
    }

    public function destroy($id)
    {
        $result = ['message' => "Item remove successfully"];
        if (!StudentRequest::destroy($id)) {
            $result = ['message' => "Item not found"];
        }
        return $result;
    }
}