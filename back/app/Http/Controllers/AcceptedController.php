<?php

namespace App\Http\Controllers;

use App\Models\Accepted;
use Illuminate\Http\Request;

class AcceptedController extends Controller
{

    public function index()
    {
        return Accepted::all();
    }


    public function store(Request $request)
    {
        $req = new  Accepted();
        $req->student_id = $request->student_id;
        $req->teacher_id = $request->teacher_id;
        $req->student_request_id = $request->student_request_id;
        $req->allow = $request->allow;
        $req->save();
        return response()->json(['message' => "Saved"]);
    }


    public function show( $id)
    {
        $result = ['message' => "Item not found"];
        if (Accepted::find($id)) {
            $result = Accepted::find($id);
        }
        return $result;
    }


    public function update(Request $request,  $id)
    {
        $req = Accepted::findOrFail($id);
        $req->student_id = $request->student_id;
        $req->teacher_id = $request->teacher_id;
        $req->student_request_id = $request->student_request_id;
        $req->allow = $request->allow;
        $req->update();
        return response()->json(['message' => "Saved"]);
    }


    public function destroy( $id)
    {
        $result = ['message' => "Item not found"];
        if (Accepted::find($id)) {
            $result = Accepted::find($id);
        }
        return $result;
    }
}
