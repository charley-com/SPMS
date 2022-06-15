<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsLoginController extends Controller
{
    public function studentsLogin(){
        return view('student_login');
    }
}
