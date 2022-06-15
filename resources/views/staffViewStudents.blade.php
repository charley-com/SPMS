<x-staff_sidebar/>  
         <div class="col-sm-9 text-center mt-5"> 
                <h3>Students</h3>
                @include('alert')
                      <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project topic</th>
                           </thead>
                        <tbody>
                            @forelse($students as $student)
                            <tr>
                                <td><a href="" class="text-dark">{{ $student->id}}</a></td>
                                <td><a href="" class="text-dark">{{ $student->last_name}} {{ $student->middle_name}} {{ $student->first_name}}</a></td>
                                <td><a href="" class="text-dark">{{ $student->project_title}}</a></td>
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
</body>
</html>
