<x-hod_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Staff</div>
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col"><a href="">SP NUMBER</a></th>
                            <th scope="col">RANK</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DESIGNATION</th>
                        </thead>
                        <tbody>
                           @forelse($staffs as $staff)
                           <tr>
                                <td><a href="{{route('staffFullProfile', ['id'=>$staff->id])}}">{{$staff->id}}</a></td>
                                <td><a href="">{{$staff->rank}}</a></td>
                                <td><a href="{{route('staffFullProfile', ['id'=>$staff->id])}}">{{$staff->last_name}} {{$staff->middle_name}} {{$staff->first_name}}</a></td>  
                                <td><a href="">{{$staff->designation}}</a></td>      
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
