<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    //GET ALL USERS
    public function index()
    {
        $listStudent= [];
        $listTeacher = [];
        array_push($listStudent, Student::get());
        array_push($listTeacher, Teacher::get());
        return $listStudentTeacher = array_merge($listStudent,$listTeacher);
    }


    public function store(Request $request)
    {

    }


    public function show(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        //
    }
}
