<x-staff_sidebar/>
<div class="col-sm-8 text-center mt-3"> 
<div class="card">
               <div class="card-header">Staff Profile</div>
                <div class="card-body" >
                    <table class="h3 table table-bordered">
                        <tr>
                            <td>Staff ID</td><td>{{$staff[0]['id']}}</td>
                        </tr>
                        <tr>
                            <td>Name</td><td>{{$staff[0]['last_name']}} {{$staff[0]['middle_name']}} {{$staff[0]['first_name']}}</td>
                        </tr>
                        <tr>
                            <td>Email</td><td>{{$staff[0]['email']}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td><td>{{$staff[0]['phone']}}</td>
                        </tr>

                        <tr>
                            <td>First Choice</td><td>{{$staff[0]['first_choice']}}</td>
                        </tr>
                        <tr>
                            <td>Second Choice</td><td>{{$staff[0]['second_choice']}}</td>
                        </tr>
                        <tr>
                            <td>Third Choice</td><td>{{$staff[0]['third_choice']}}</td>
                        </tr>
                        <tr>
                            <td>Number Of Students</td><td>{{$staff[0]['number_of_students']}}</td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="card-footer d-inline space-around">
                    <a href="{{route('hodHome')}}">Back</a>
                </div> -->
               </div>
         </div>

</div>
</div>
</body>
</html>