<x-staff_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Topics</div>
                @include('alert')
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col">Topic</th>
                            <th scope="col">Description</th>
                            
                        </thead>
                        <tbody>
                           <tr>
                                <td>{{$shows['topic']}}</td>
                                <td>{{$shows['description']}}</td>                                 
                            </tr>  
                            <tr>
                                <td colspan="2">
                                <form action="{{route('topicApprove', ['topic'=>$shows['approve'], 'code'=>$shows['code']])}}" method="post">
                                    @csrf
                                    <button type="submit" name="approve" class="btn btn-outline-success btn-sm">Approve</button>
                                    <button type="submit" name="back" class="btn btn-outline-info btn-sm">Back</button>
                                </form>        
                                </td>
                            </tr>                        
                        </tbody>
                                     
                    </table>
         </div>
</div>
</div>
</body>
</html>
