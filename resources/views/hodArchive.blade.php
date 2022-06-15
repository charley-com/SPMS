<x-hod_sidebar/>  
<div class="col-sm-9 text-center mt-5"> 
                <h3>Archive</h3>
                @include('alert')
            
                      <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Project Code</th>
                            <th scope="col">Project Topic</th>
                            <th scope="col">Project Supervisor</th>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">Action</th>
                           </thead>
                        <tbody>
                            @forelse($archives as $archive)
                            <tr>
                                <td><a href="{{route('projectGroupFullProfile', $archive->id)}}" class="text-dark">{{ $archive->id}}</a></td>
                                <td><a href="" class="text-dark">{{ $archive->project_title}}</a></td> 
                                <td><a href="{{route('staffFullProfile', $archive->sp_number)}}" class="text-dark">{{ $archive->sp_number}}</a></td>
                                <td><a href="" class="text-dark">{{ $archive->date_submitted}}</a></td>
                                <td><a href="">Download</a></td>
                            </tr>
                            @empty                            
                            @endforelse                            
                        </tbody>
                    </table>
                    <span>
                        {{$archives->links()}}
                    </span>
               </div>
</div>
</div>
</body>
</html>
