<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use App\Models\Staff;
use App\Models\Archive;
use App\Models\Complain;
use App\Models\Student;
use App\Models\Project_topic;
use App\Models\Project_group;
use App\Models\Proposed_group;
use App\Models\Approved_topic;

class StaffController extends Controller
{
    public function approveTopic()
    {   
        $topics = Project_topic::where('sp_number', session('sp_number'))->where('status1', 'NO')->where('status2', 'NO')->where('status3', 'NO')->paginate(9);
        //return ($topics);
        return view('staffApproveTopics', compact('topics'));
        
    }

    public function topicSingle(Request $req)
    {   
        $topic = $req->topic;
        $code = $req->code;
        $topicSingle = Project_topic::where('id', $code)
        ->get();

            if($topicSingle[0]['topic1'] == $topic)
            {   
                $show = ['topic'=>$topicSingle[0]['topic1'], 'description'=>$topicSingle[0]['desc1'], 'approve'=>'topic1', 'code'=>$code];
                //return ($show['description']);
                return view('topicSingle', ['shows'=>$show]);
            }
            elseif($topicSingle[0]['topic2'] == $topic)
            {
                $show = ['topic'=>$topicSingle[0]['topic2'], 'description'=>$topicSingle[0]['desc2'], 'approve'=>'topic2', 'code'=>$code];
                return view('topicSingle', ['shows'=>$show]);
            }
            elseif($topicSingle[0]['topic3'] == $topic)
            {
                $show = ['topic'=>$topicSingle[0]['topic3'], 'description'=>$topicSingle[0]['desc3'], 'approve'=>'topic3', 'code'=>$code];
                return view('topicSingle', ['shows'=>$show]);
            }       

      //return ($topicSingle);
    //    //return view('topicSingle');
    }
    public function topicApprove(Request $req)
    {
        $topic = $req->topic;
        $code = $req->code;
        $approve = Project_topic::find($code)->first();
            if($topic == 'topic1'){
                $approve->status1 = 'YES'; 
                $approve->save();
                return redirect()->route('approveTopic')->with('success', 'You have approved  topic for student');
            }
            elseif($topic == 'topic2')
            {
                $approve->status2 = 'YES';
                $approve->save();
                return redirect()->route('approveTopic')->with('success', 'You have approved  topic for student');
            }
            elseif($topic == 'topic3')
            {
                $approve->status3 = 'YES';
                $approve->save();
                return redirect()->route('approveTopic')->with('success', 'You have approved  topic for student');
            }
    }
    public function approve(Request $req)
    {
        if($req->approve)
        {   
            //return ($req->approve);
           $group = Proposed_group::find($req->approve);
             $group->status = 'APPROVED';
             $group->save();
                    if($group->save()){
                        $projectGroup = new Project_group;
                        $projectGroup->student1_id = $group->student1_id;
                        $projectGroup->student2_id = $group->student2_id;
                        $projectGroup->student3_id = $group->student3_id;
                        $projectGroup->sp_number = $group->sp_number;

                        $projectGroup->save();
                        return redirect()->route('staffHome')
                        ->with('success', 'Project group approved successfully.');                        
                    }
        }
        elseif($req->decline)
        {
            $group = Proposed_group::find($req->decline);
            $group->delete();
            return redirect()->route('staffHome')
                        ->with('success', 'Project group declined successfully.');
        }
    }

    public function approveGroup()
    {
        $groups = Proposed_group::where('sp_number', session('sp_number'))->where('status', 'NOT APPROVED')->paginate(9);
        return view('staffApproveGroup', compact('groups'));
    }
    public function groupMembers()
    {
        return view('groupMembers');
    }
    
    public function staffHome()
    {
        return view('staffHome');
    }

    public function staffProfile()
    {   
        $staff = Staff::where('id', session('sp_number'))->first();
        return view('staffUpdateProfile', ['staff'=>$staff]);
    }

    public function staffComplain()
    {   
        $complains = Complain::where('sp-number', session('sp_number'))->paginate(9);
        return view('staffViewComplain', compact('complains'));
    }

    public function staffStudent(){
        $students = Student::where('sp_number', session('sp_number'))->paginate(9);
        return view('staffViewStudents', compact('students'));
    }

    public function staffArchive()
    {
        $archives = Archive::paginate(9) ;  
        return view('staffArchive', compact('archives'));
    }
    public function staffFullProfile(Request $req)
    {   
        $id = $req->id;
        $staff = Staff::where('id', $id)->get();
        return view('staffFullProfile', ['staff'=>$staff]);
    }

    public function projectGroupFullProfile(Request $req)
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

    public function staffSubmission()
    {
        $submissions = Submission::paginate(9) ;  
        return view('staffViewProjects', compact('submissions'));
    }

    public function login_staff(Request $req){
        $data = $req->input();
        $sp_number = $data['sp_number'];
        $password = $data['password'];
        
        $check = Staff::where('id', $sp_number)->where('password', $password)->get();
        if (isset($check[0])){
            if($sp_number == $check[0]['id'] && $password == $check[0]['password']){
                $req->session()->put('last_name', $check[0]['last_name']);
                $req->session()->put('sp_number', $check[0]['id']);
                $req->session()->put('designation', $check[0]['designation']);
                $req->session()->put('rank', $check[0]['rank']);
                $req->session()->put('staff', $check[0]['rank']);
                //$sp = session('sp_number');

                    
                return view('staffHome');
            }
            else{
                return view('staff_login');
            }
        }
        else {
            return view('staff_login');
        }
    }
    public function update(Request $request)
    {
        $staff = Staff::find($request->sp_number);       
        
        $staff->last_name = $request->input('last_name');
        $staff->middle_name = $request->input('middle_name');
        $staff->first_name = $request->input('first_name');
        $staff->email = $request->input('email');
        $staff->phone = $request->input('phone');
        $staff->password = $request->input('password');
        $staff->first_choice = $request->input('first_choice');
        $staff->second_choice = $request->input('second_choice');
        $staff->third_choice = $request->input('third_choice'); 
         
        $staff->save();
            if($staff){
                (session()->put('last_name', $staff->last_name));
                }
        
         return redirect('staffProfile');
        //return ($student); 

    }
}
