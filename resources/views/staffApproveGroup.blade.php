<x-staff_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Proposed Groups</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Project Code</th>
                            <th scope="col">Student 1</th>
                            <th scope="col">Student 2</th>
                            <th scope="col">Student 3</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                           @forelse($groups as $group)
                           <tr>
                                <td><a href="">{{$group->id}}</a></td> 
                                <td><a href="">{{$group->student1_id}}</a></td> 
                                <td><a href="">{{$group->student2_id}}</a></td> 
                                <td><a href="">{{$group->student3_id}}</a></td>  
                                <td>
                                    <form action="{{route('approve')}}" method="post" >
                                        @csrf
                                    <button name="approve" value="{{$group->id}}" type="submit" class="btn btn-outline-primary">Approve</button>
                                    <button name="decline" value="{{$group->id}}" type="submit" class="btn btn-outline-danger">Decline</button>
                                    </form>
                                </td>                                     
                            </tr>
                            @empty
                            @endforelse                           
                        </tbody>
                    </table>
                    <span>
                        {{$groups->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>
