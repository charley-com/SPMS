<x-student_-sidebar/>  
<div class="col-sm-9 text-center mt-5"> 
         <div class="card">
         @include('alert')
                <div class="card-header">Create Group</div>

                      <table class="table table-bordered">
                        <thead>
                            <th scope="col">Student ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                           </thead>
                        <tbody>
                           
                            @forelse($members as $member)
                            <tr>
                                
                                <td><a href="{{route('studentFullProfile', ['id'=>$member->id])}}" class="text-dark">{{ $member->id}}</a></td>
                                <td><a href="{{route('studentFullProfile', ['id'=>$member->id])}}" class="text-dark">{{ $member->last_name}} {{ $member->middle_name}} {{ $member->first_name}}</a></td>
                                <td>
                                <form action="{{route('groupMember', $member->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="member_id" value="{{$member->id}}">
                                <button class="text-dark btn btn-sm btn-outline-success" type="submit">Add to group</button>    
                                </form>
                                </td>
                            </tr>
                            @empty                            
                            @endforelse                            
                        </tbody>
                    </table>
                    <div class="card-footer">
                        <h5>If you do not want to be in a group, click 
                            <form action="{{route('noGroup')}}" method="post">
                                @csrf
                                <button class="btn btn-outline-primary">
                                    Here
                                </button>
                            </from>
                        </h5>
                    </div>
                    <span>
                        {{$members->links()}}
                    </span>
               </div>
         </div>
</div>
</div>
</body>
</html>
