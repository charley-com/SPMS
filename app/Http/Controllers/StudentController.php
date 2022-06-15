<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Project_group;
use App\Models\Proposed_group;
use App\Models\Project_topic;
Use App\Models\Submission;
Use App\Models\Complain;
Use App\Models\Archive;

class StudentController extends Controller
{
    public function addProjectTopic()
    {   
        $code = Project_group::where('student1_id', session('student_id'))
        ->orWhere('student2_id', session('student_id'))
        ->orWhere('student3_id', session('student_id'))->first();
        if($code != ''){
        $check = Project_topic::where('id', $code->id )->first();
        if($check){
        if($check->status1 == 'NO' && $check->status2 == 'NO' && $check->status3 == 'NO'){
            session()->put('show', 'hidden');
            return view('studentAddProjectTopic');
            //return ('true');
        }
        elseif($check->status1 == 'YES' || $check->status2 == 'YES' || $check->status3 == 'YES'){
            session()->pull('show', 'hidden');
            session()->put('display', 'approved');
            return view('studentAddProjectTopic');
        }
        else{
            session()->pull('show', 'hidden');
            session()->pull('display', 'approved');
            return view('studentAddProjectTopic');
        }
        }
        else{
            session()->pull('show', 'hidden');
            session()->pull('display', 'approved');
            return view('studentAddProjectTopic');
        }
    }
    else{
        //$topicUpload = 'null';
        return view('errorDisplay', ['topicUpload']);
    }
    }
    public function projectTopic(Request $req){
        //get project code
        $code = Project_group::where('student1_id', session('student_id'))
        ->orWhere('student2_id', session('student_id'))
        ->orWhere('student3_id', session('student_id'))->first();
        $projectTopic = new Project_topic;
        $projectTopic->id =  $code->id;
        $projectTopic->topic1 = $req->topic1;
        $projectTopic->topic2 = $req->topic2;
        $projectTopic->topic3 = $req->topic3;
        $projectTopic->desc1 = $req->desc1;
        $projectTopic->desc2 = $req->desc2;
        $projectTopic->desc3 = $req->desc3;
        $projectTopic->sp_number = $code->sp_number;
        $projectTopic->date_submitted = date('Y-m-d', time());

        $projectTopic->save();
        // $req->session()->flash('topicAdded');
        return back()
        ->with('success', 'Project topic added successfully.'); 



    }

    public function addComplain()
    {
        return view('studentComplain');
    }

    public function complain(Request $req)
    {   
        $complain = new Complain;
        $complain->student_id = session('student_id');
        $complain->complain = $req->complain;
        $complain->date_sent = date('Y-m-d');

        $complain->save();
        return back()
        ->with('success', 'Complain added successfully.'); 
        
    }

    public function studentHome()
    {
        return view('studentHome');
    }

    public function studentProfile()
    {   
        $student = Student::where('id', session('student_id'))->first();
        //$student = Student::find(session('student_id'));
        //return ($student);
        return view('studentUpdateProfile', ['student'=>$student]);
                
    }


    public function uploadProject()
    {   
        $code = Project_group::where('student1_id', session('student_id'))
        ->orWhere('student2_id', session('student_id'))
        ->orWhere('student3_id', session('student_id'))->first();
        if($code != ''){
        return view('studentUploadProject');
    }
    else{
        //$projectUpload = 'null';
        return view('errorDisplay', ['projectUpload']);
}    
}


    public function uploadProjectFile(Request $req)
    {   
        $code = Project_group::where('student1_id', session('student_id'))
        ->orWhere('student2_id', session('student_id'))
        ->orWhere('student3_id', session('student_id'))->first();
        if($code != ''){
        $projectCode = $code->id;
        $sp_number = $code->sp_number;
        if($projectCode){
            $file = $req->file('projectFile')->store('project files');
                $projectFile = new Submission;
                $projectFile->id = $projectCode;
                $projectFile->project_title = $req->projectTitle;
                $projectFile->project_file = $file;
                $projectFile->date_submitted = date('Y-m-d');
                $projectFile->sp_number = $sp_number;
            $projectFile->save();
            return back()
            ->with('success', 'Project uploaded successfully.');           
        } 
        else{
            return back()
        ->with('danger', 'Project was not uploaded.'); 
        }                
    }
    else{
            //$projectUpload = 'null';
            return view('errorDisplay', ['projectUpload']);
    }    
    
}

    public function studentFullProfile(Request $req)
            {   
                $id = $req->id;
                $profile = Student::where('id', $id)->get();
                return view('studentFullProfile', ['student'=>$profile]);

            }

    public function viewApprovedTopic()
    {   
        $code = Project_group::where('student1_id', session('student_id'))
        ->orWhere('student2_id', session('student_id'))
        ->orWhere('student3_id', session('student_id'))->first();
        if($code != ''){
        $projectCode = $code->id;
                $approvedTopic = Project_topic::where('id', $projectCode)->get();
                    if($approvedTopic[0]['status1'] == 'YES')
                    {
                        return view('studentViewApprovedTopic', ['topic'=>$approvedTopic[0]['topic1']]);
                    }
                    elseif($approvedTopic[0]['status2'] == 'YES')
                    {
                        return view('studentViewApprovedTopic', ['topic'=>$approvedTopic[0]['topic2']]);
                    }
                    elseif($approvedTopic[0]['status3'] == 'YES')
                    {
                        return view('studentViewApprovedTopic', ['topic'=>$approvedTopic[0]['topic3']]);
                    }
        }
        //return view('studentViewApprovedTopic');
    }

    public function studentArchive()
    {   $archives = Archive::paginate(9);
        return view('visitArchive', compact('archives'));
    }


    public function createGroup(){
        $groupCheck = Student::where('id', session('student_id'))->get();        
        if($groupCheck[0]['project_code'] == ""){
            $members = Student::where('sp_number', session('sp_number'))
                                ->where('id', '!=', session('student_id'))
                                ->where('project_code', "")->paginate(9);  
                                           
                    return view('studentCreateGroup', compact('members'));            
        }
        else{
            return ('cannot join group');
            // return redirect()->route('studentHome')
            // ->with('danger', 'You cannot join a group');   
            // // return('You cannot join a group');
             }
        
    }

    public function noGroup()
    {
        $projectGroup = new Project_group;
        $projectGroup->student1_id = session('student_id');
        $projectGroup->student2_id = 'NULL';
        $projectGroup->student3_id = 'NULL';
        $projectGroup->approved_topic = 'NULL';
        $projectGroup->sp_number = session('sp_number');

        $projectGroup->save();
            if($projectGroup->save()){
                $code = Project_group::where('student1_id', session('student_id'))
                ->orWhere('student2_id', session('student_id'))
                ->orWhere('student3_id', session('student_id'))->first();
                    if($code != ''){
                        $projectCode = $code->id;
                            $updateStudentTable = Student::find(session('student_id'));
                            $updateStudentTable->project_code = $projectCode;
                            $updateStudentTable->save();
                            return redirect()->route('studentHome')->with('success', 'Project code generated successfully.');
                        return redirect('studentHome');
                    }

            }
        
    }


    public function groupMember(Request $req){
        $data = $req->input();
        $member_id = $data['member_id'];

        $checkStudent = Project_group::where('student1_id', session('student_id'))->get();
        if(count($checkStudent) == 0){
            $secondCheck = Proposed_group::where('student1_id', session('student_id'))->get();
            if(count($secondCheck) == 0){            
            $student = Student::where('id', session('student_id'))->get();
            if($student[0]['project_code'] == ''){
                    $group = new Proposed_group;
                    $group->student1_id = session('student_id');
                    $group->student2_id = $member_id;
                    $group->student3_id = 'NULL';
                    $group->sp_number = $student[0]['sp_number'];                
                    $group->save();
                    return back()
                    ->with('success', 'group member has been added');   
            }
                else{
                    $req->session()->flash('haveProjectCode');
                    return view('studentCreateGroup');  
            }  
        }
        elseif(count($secondCheck) != 0){
            if($secondCheck[0]['student2_id'] !=  'NULL' && $secondCheck[0]['student3_id'] == 'NULL' ){
                $current_id = $secondCheck[0]['id'];
                $student = Proposed_group::find($current_id); 
                    if($student->student2_id != $student->student3_id){
                        $student->student3_id = $member_id;
                        $student->save();
                        return back()
                        ->with('success', 'group member has been added');   
                    }
                    else{
                        return back()
                        ->with('danger', 'group member was not added');   
                    }
               
            }
            elseif($secondCheck[0]['student2_id'] != 'NULL' && $secondCheck[0]['student3_id'] != 'NULL' ){
                $req->session()->flash('member_not_added', $member_id);
                return back();
            }
        }
        else{
            return back()
            ->with('danger', 'You cannot join a group');   
        }      
    }   
    }


    public function login_student(Request $req){
        $data = $req->input();
        $student_id = $data['student_id'];
        $password = $data['password'];
        
        $check = Student::where('id', $student_id)->where('password', $password)->get();
        if (isset($check[0])){
            if($student_id == $check[0]['id'] && $password == $check[0]['password']){
                $req->session()->put('last_name', $check[0]['last_name']);
                $req->session()->put('sp_number', $check[0]['sp_number']);
                $req->session()->put('student_id', $check[0]['id']);
                $req->session()->put('student', $check[0]['id']);
                
                //return (session('student_id'));
                return view('studentHome');
            }
            else{
                return view('student_login');
            }
        }
        else {
            return view('student_login');
        }
    }
}
