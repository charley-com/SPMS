<x-student_-sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Archive</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Project Code</th>
                            <th scope="col">Project Topic</th>
                            <th scope="col">Supervisor</th>
                            <th scope="col">Year</th>
                        </thead>
                        <tbody>
                           @forelse($archives as $archive)
                           <tr>
                                <td>{{$archive->id}}</td>
                                <td>{{$archive->project_title}}</td>
                                <td>{{$archive->sp_number}}</td>
                                <td>{{$archive->date_submitted}}</td>        
                            </tr>
                           @empty
                           <tr>
                              <td>Archive is empty</td>
                           </tr>

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
