<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Staff;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('adminHome');
    }

    public function manageStaff()
    {   
        $staff = Staff::paginate(9);
        return view('adminManageStaff', ['staffs'=>$staff]);
    }

    public function addStaff()
    {
        return view('adminAddStaff');
    }
    public function uploadStaff(Request $req){
        if(request()->has('staff')){
            $staffData = array_map('str_getcsv',file(request()->staff));

            //return $staffData;
            $header = $staffData[0];
          
            unset($staffData[0]);

            foreach($staffData as $value)
            {   
                $data = array_combine($header, $value);
                Staff::create($data);
            }
            $req->session()->flash('uploadStaff', 'Done');
            return redirect('addStaff');
        } 
    }

    public function login_admin(Request $req){
        $data = $req->input();
        $username = $data['username'];
        $password = $data['password'];

        $check = Admin::where('username', $username)->where('password', $password)->get();
        if (isset($check[0])){
            if($username == $check[0]['username'] && $password == $check[0]['password']){
                $req->session()->put('username', $username);
                return view('adminHome');
            }
            else{
                return view('admin_login');
            }
        }
        else {
            return view('admin_login');
        }
    }
}
