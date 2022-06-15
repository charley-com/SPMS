<x-hod_sidebar/>
<div class="col-sm-8 text-center mt-3"> 
<div class="card">
               <div class="card-header">Project Group Profile</div>
                <div class="card-body" >
                    <table class="h3 table table-bordered">
                        <tr>
                            <td>Group ID</td><td>{{$group[0]['id']}}</td>
                        </tr>
                        <tr>
                            <td>Student 1</td><td>{{$group[0]['student1_id']}}</td>
                        </tr>
                        <tr>
                            <td>Student 2</td><td>{{$group[0]['student2_id']}}</td>
                        </tr>

                        <tr>
                            <td>Student 3</td><td>{{$group[0]['student3_id']}}</td>
                        </tr>
                        <tr>
                            <td>Approved Topic</td><td>{{$group[0]['approved_topic']}}</td>
                        </tr>
                        <tr>
                            <td>Supervisor</td><td>{{$supervisor[0]['rank']}} {{$supervisor[0]['last_name']}} {{$supervisor[0]['middle_name']}} {{$supervisor[0]['first_name']}}</td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="card-footer d-inline space-around">
                    <a href="{{route('hodStudent')}}">Back</a>
                </div> -->
               </div>
         </div>

</div>
</div>
</body>
</html>