<x-student_-sidebar/>
<div class="col-sm-8 text-center mt-3"> 
<div class="card">
               <div class="card-header">Student Profile</div>
                <div class="card-body" >
                @include('alert')
                    <table class="h3 table table-bordered">
                        <tr>
                            <td>Student ID</td><td>{{$student[0]['id']}}</td>
                        </tr>
                        <tr>
                            <td>Name</td><td>{{$student[0]['last_name']}} {{$student[0]['middle_name']}} {{$student[0]['first_name']}}</td>
                        </tr>
                        <tr>
                            <td>Email</td><td>{{$student[0]['email']}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td><td>{{$student[0]['phone']}}</td>
                        </tr>

                        <tr>
                            <td>First Choice</td><td>{{$student[0]['first_choice']}}</td>
                        </tr>
                        <tr>
                            <td>Second Choice</td><td>{{$student[0]['second_choice']}}</td>
                        </tr>
                        <tr>
                            <td>Third Choice</td><td>{{$student[0]['third_choice']}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer d-inline space-around">
                    <a href="{{route('createGroup', session('sp_number'))}}">Back</a>
                </div>
               </div>
         </div>

</div>
</div>
</body>
</html>