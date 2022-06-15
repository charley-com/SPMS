<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Staff;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $studentProfile = Student::find($id);
        //     return view('studentFullProfile', ['student'=>$studentProfile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // $this->validate($request, [
        //     'student_id'=> 'required|max:225',
        //     'last_name'=> 'required|string|max:225',
        //     'middle_name'=> 'required|string|max:225',
        //     'first_name'=> 'required|string|max:225',
        //     'email'=> 'required|string|max:225',
        //     'phone'=> 'required|string|max:225',
        //     'password'=> 'required|string|max:225',
        //     'first_choice'=> 'required|string|max:225',
        //     'second_choice'=> 'required|string|max:225',
        //     'third_choice'=> 'required|string|max:225',
            
        // ]);
        //$student = Student::where('student_id', $request->student_id)->first(); 
        $student = Student::find($request->student_id);       
        
        $student->last_name = $request->input('last_name');
        $student->middle_name = $request->input('middle_name');
        $student->first_name = $request->input('first_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->password = $request->input('password');
        $student->first_choice = $request->input('first_choice');
        $student->second_choice = $request->input('second_choice');
        $student->third_choice = $request->input('third_choice'); 
         
        $student->save();
            if($student){
                (session()->put('last_name', $student->last_name));
                (session()->put('first_choice', $student->first_choice));
                (session()->put('second_choice', $student->second_choice));
                (session()->put('third_choice', $student->third_choice));
                    if($student->sp_number == ''){
                        $max_student = 10;
                        $check = Staff::where('number_of_students', '<=', 10)
                        ->where(function($query){
                            $query->where('first_choice', session('first_choice'))->orWhere('second_choice', session('first_choice'))->orWhere('third_choice', session('first_choice'));
                        })
                        ->get();
                                //check if query is empty
                                if(!$check->isEmpty()){
                                    $shuffledCheck = $check->shuffle()->first();
                                    $assignedSupervisor = $shuffledCheck['id'];
                                    $student = Student::find($request->student_id); 
                                    $student->sp_number = $assignedSupervisor;
                                    $student->save();
                                    return redirect('studentHome')
                                    ->with('success', 'Your profile has been updated.');

                                    //check for second choice
                                }else {

                                    $check = Staff::where('number_of_students', '<=', 10)
                                        ->where(function($query){
                                            $query->where('first_choice', session('second_choice'))->orWhere('second_choice', session('second_choice'))->orWhere('third_choice', session('second_choice'));
                                        })
                                        ->get();
                                                //check if query is empty
                                                if(!$check->isEmpty()){
                                                    $shuffledCheck = $check->shuffle()->first();
                                                    $assignedSupervisor = $shuffledCheck['id'];
                                                    $student = Student::find($request->student_id); 
                                                    $student->sp_number = $assignedSupervisor;
                                                    $student->save();
                                                    return redirect('studentHome')
                                                    ->with('success', 'Your profile has been updated');

                                                    //check for third choice
                                                }else {
                                                    $check = Staff::where('number_of_students', '<=', 10)
                                                    ->where(function($query){
                                                        $query->where('first_choice', session('third_choice'))->orWhere('second_choice', session('third_choice'))->orWhere('third_choice', session('third_choice'));
                                                    })
                                                    ->get();
                                                            //check if query is empty
                                                            if(!$check->isEmpty()){
                                                                $shuffledCheck = $check->shuffle()->first();
                                                                $assignedSupervisor = $shuffledCheck['id'];
                                                                $student = Student::find($request->student_id); 
                                                                $student->sp_number = $assignedSupervisor;
                                                                $student->save();
                                                                return redirect('studentHome')
                                                                ->with('success', 'Your profile has been updated');
                            
                                                                
                                                            }else {
                                                                $check = Staff::where('first_choice', session('first_choice'))->orWhere('second_choice', session('first_choice'))->orWhere('third_choice', session('first_choice'))
                                                                ->get();
                                                                        //check if query is empty
                                                                        if(!$check->isEmpty()){
                                                                            $shuffledCheck = $check->shuffle()->first();
                                                                            $assignedSupervisor = $shuffledCheck['id'];
                                                                            $student = Student::find($request->student_id); 
                                                                            $student->sp_number = $assignedSupervisor;
                                                                            $student->save();
                                                                            return redirect('studentHome');
                                        
                                                                            //check for second choice
                                                                        }else{
                                                                            $check = Staff::where('first_choice', session('second_choice'))->orWhere('second_choice', session('second_choice'))->orWhere('third_choice', session('second_choice'))
                                                                ->get();
                                                                        //check if query is empty
                                                                        if(!$check->isEmpty()){
                                                                            $shuffledCheck = $check->shuffle()->first();
                                                                            $assignedSupervisor = $shuffledCheck['id'];
                                                                            $student = Student::find($request->student_id); 
                                                                            $student->sp_number = $assignedSupervisor;
                                                                            $student->save();
                                                                            return redirect('studentHome')
                                                                            ->with('success', 'Your profile has been updated');
                                        
                                                                            //check for second choice
                                                                        }else{
                                                                            $check = Staff::where('first_choice', session('third_choice'))->orWhere('third_choice', session('first_choice'))->orWhere('third_choice', session('third_choice'))
                                                                ->get();
                                                                        //check if query is empty
                                                                        if(!$check->isEmpty()){
                                                                            $shuffledCheck = $check->shuffle()->first();
                                                                            $assignedSupervisor = $shuffledCheck['id'];
                                                                            $student = Student::find($request->student_id); 
                                                                            $student->sp_number = $assignedSupervisor;
                                                                            $student->save();
                                                                            return redirect('studentHome');
                                        
                                                                            //check for second choice
                                                                        }else{
                                                                            $check = Staff::all();
                                                                        //check if query is empty
                                                                        if(!$check->isEmpty()){
                                                                            $shuffledCheck = $check->shuffle()->first();
                                                                            $assignedSupervisor = $shuffledCheck['id'];
                                                                            $student = Student::find($request->student_id); 
                                                                            $student->sp_number = $assignedSupervisor;
                                                                            $student->save();
                                                                            return redirect('studentHome')
                                                                            ->with('success', 'Your profile has been updated');
                                        
                                                                            //check for second choice
                                                                        }else{
                                                                            return redirect('studentProfile');
                                                                        }
                                                                        }
                                                                        }
                                                                        }
                                                                
                                                                }
                                                    
                                                    }

                                    }
                        // $shuffledCheck = $check->shuffle()->first();  
                        // //if($check[0]['first_choice'] == '')     
                        // return($shuffledCheck);
                        
                    }
                    else{
                        return back()
                        ->with('danger', 'supervisor has already been assigned');
                    }
            
                }        
         //return redirect('studentProfile');
        //return ($student); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
