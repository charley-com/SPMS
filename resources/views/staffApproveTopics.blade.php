<x-staff_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Approve Topics</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Project Code</th>
                            <th scope="col">Topic 1</th>
                            <th scope="col">Topic 2</th>
                            <th scope="col">Topic 3</th>
                            <th scope="col">Date Submitted</th>
                        </thead>
                        <tbody>
                           @forelse($topics as $topic)
                           <tr>
                                <td><a href="{{route('projectGroupFullProfile', $topic->id)}}">{{$topic->id}}</a></td> 
                                <td><a href="{{route('topicSingle', ['topic'=>$topic->topic1, 'code'=>$topic->id])}}">{{$topic->topic1}}</a></td>
                                <td><a href="{{route('topicSingle', ['topic'=>$topic->topic2, 'code'=>$topic->id])}}">{{$topic->topic2}}</a></td>
                                <td><a href="{{route('topicSingle', ['topic'=>$topic->topic3, 'code'=>$topic->id])}}">{{$topic->topic3}}</a></td>
                                <td>{{$topic->date_submitted}}</td>
                                    
                            </tr>
                            @empty
                            <tr>
                            <td colspan="5"> No pending topics</td>
                           </tr>
                            @endforelse                           
                        </tbody>
                    </table>
                    <span>
                        {{$topics->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>
