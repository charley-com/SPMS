<x-staff_sidebar/>  
<div class="col-sm-8 text-center mt-5"> 
                <div class="h3">Complains</div>
                <table class="table table-hover table-bordered">
                        <thead>
                            <th scope="col"><a href="">student ID</a></th>
                            <th scope="col">Complain</th>
                            <th scope="col">Date Submitted</th>
                        </thead>
                        <tbody>
                           @forelse($complains as $complain)
                           <tr>
                                <td>{{$complain->id}}</td>
                                <td>{{$complain->complain}}</td>
                                <td>{{$complain->date_sent}}</td>      
                            </tr>
                        </tbody>
                        @empty
                           <tr>
                               <td colspan="3">
                                <h4 class="text-info">No complains to review</h3>
                               </td>
                           </tr>
                              
                           @endforelse
                    </table>
                    <span>
                        {{$complains->links()}}
                    </span>
         </div>
</div>
</div>
</body>
</html>
