<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Staff;
use App\Models\Archive;
use App\Models\Complain;
use App\Models\Project_topic;
use App\Models\Project_group;
use App\Models\Proposed_group;
use App\Models\Approved_topic;

class CoordinatorController extends Controller
{
    public function coordHome(){
        return view('coordinatorHome');
    }

    public function coordStudent(){
        $students = Student::paginate(9);
        return view('coordinator_viewStudents', compact('students'));
    }

    public function coordProject(){
        $submissions = Submission::paginate(9);
        return view('coordinator_viewProject', compact('submissions'));
    }

    public function coordComplain(){
        $complains = Complain::paginate(9);
        return view('coordinator_resolveComplain', compact('complains'));
    }

    public function coordUploadStudent(){
        return view('uploadStudents');
    }
    public function uploadStudent(Request $req){
        if(request()->has('student')){
            $studentData = array_map('str_getcsv',file(request()->student));

            //return $staffData;
            $header = $studentData[0];
          
            unset($studentData[0]);

            foreach($studentData as $value)
            {   
                $data = array_combine($header, $value);
                Student::create($data);
            }
            return redirect('coordUploadStudent')
            ->with('success', 'file has been uploaded successfully');
        } 
    }

    public function coordSupervisor(){
        $staff = Staff::paginate(9);
        return view('viewSupervisors', ['staffs'=>$staff]);
    }

    public function coordArchive(){
        $archives = Archive::paginate(9);
        //return ($archives);
        return view('coordArchive', compact('archives'));
    }
}
