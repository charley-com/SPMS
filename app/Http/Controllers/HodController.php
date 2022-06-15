<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\Archive;
use App\Models\Complain;
use App\Models\Submission;
use App\Models\Student;
use App\Models\Project_group;

class HodController extends Controller
{
    public function hodHome()
    {
        return view('hodHome');
    }

    public function hodComplain()
    {   
        $complains = Complain::paginate(9);
        return view('hodViewComplain', compact('complains'));
    }

    public function hodProject()
    {   
        $submissions = Submission::paginate(9);
        return view('hodViewProjects', compact('submissions'));
    }

    public function viewStaff()
    {   
        $staff = Staff::paginate(9);
        return view('hodViewStaff', ['staffs'=>$staff]);
    }

    public function hodStudent()
    {  
        $students = Student::paginate(9);
        return view('hodViewStudents', compact('students'));
    }
    public function groupFullProfile(Request $req)
    {   
        $id = $req->id;
        $group = Project_group::where('id', $id)->get();
                $supervisorID = $group[0]['sp_number'];
                $supervisor = Staff::where('id', $supervisorID)->get();
        // if($key->sp_number){
        //     $supervisor = Staff::find($key->sp_number);
            return view('projectGroupFullProfile', ['group'=>$group, 'supervisor'=>$supervisor]);
        // }
        // else{
        //     return view('hodStudent');
        // }
        
    }

    public function hodArchive()
    {   
        $archives = Archive::paginate(9);
        //return ($archives);
        return view('hodArchive', compact('archives'));
    }
}
