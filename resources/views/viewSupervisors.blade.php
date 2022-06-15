<x-coordinator_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">View Supervisors</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Staff ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Rank</th>
                            <th scope="col">Designation</th>
                        </thead>
                        <tbody>
                            @forelse($staffs as $staff)
                            <tr>
                                <td><a href="" class="text-dark">{{$staff->id}}</a></td>
                                <td><a href="" class="text-dark">{{$staff->last_name}} {{$staff->middle_name}} {{$staff->first_name}}</a></td>
                                <td><a href="" class="text-dark">{{$staff->rank}}</a></td>
                                <td><a href="" class="text-dark">{{$staff->designation}}</a></td>              
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <span>
                        {{$staffs->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>
