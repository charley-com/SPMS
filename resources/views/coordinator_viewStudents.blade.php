<x-coordinator_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Students</div>
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Student ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">PROJECT CODE</th>
                            <th scope="col">PROJECT TITLE</th>
                            <th scope="col">PROJECT SUPERVISOR</th>
                        </thead>
                        <tbody>
                           @forelse($students as $student)
                           <tr>
                                <td><a href="">{{$student->id}}</a></td>
                                <td><a href="">{{$student->last_name}} {{$student->middle_name}} {{$student->first_name}}</a></td> 
                                <td><a href="{{route('projectGroupFullProfile', $student->project_code)}}">{{$student->project_code}}</a></td> 
                                <td><a href="">{{$student->project_title}}</a></td>
                                <td><a href="{{route('staffFullProfile', $student->sp_number)}}">{{$student->sp_number}}</a></td>        
                            </tr>
                            @empty
                           @endforelse
                        </tbody>
                    </table>
                    <span>
                        {{$students->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>
