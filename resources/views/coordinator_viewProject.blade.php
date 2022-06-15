<x-coordinator_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Submitted Projects</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Project Code</th>
                            <th scope="col">Project Topic</th>
                            <th scope="col">Supervisor</th>
                            <th scope="col">Year</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                           @forelse($submissions as $submission)
                           <tr>
                                <td><a href="{{route('projectGroupFullProfile', $submission->id)}}">{{$submission->id}}</a></td>
                                <td><a href="">{{$submission->project_title}}</a></td>
                                <td><a href="{{route('staffFullProfile', $submission->sp_number)}}">{{$submission->sp_number}}</a></td>
                                <td>{{$submission->date_submitted}}</td>
                                <td><a href="">Download</a></td>        
                            </tr>
                           @empty
                           <tr>
                              <td>Archive is empty</td>
                           </tr>

                           @endforelse
                           
                        </tbody>
                    </table>
                    <span>
                        {{$submissions->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>