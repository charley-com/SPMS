<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffLoginController extends Controller
{
    public function staffLogin(){
        return view('staff_login');
    }
}
