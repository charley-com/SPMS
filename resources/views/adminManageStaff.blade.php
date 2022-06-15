<x-admin_sidebar/>  
         <div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Manage Staff</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Staff ID</th>                            
                            <th scope="col">Rank</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                        </thead>
                        <tbody>
                        @foreach($staffs as $staff)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->rank}}</td>
                                <td>{{$staff->last_name}} {{$staff->middle_name}} {{$staff->first_name}}</td>
                                <td>{{$staff->designation}}</td>              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span>
                        {{$staffs->links()}}
                    </span>
         </div>
</body>
</html>
