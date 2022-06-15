<x-student_-sidebar/>  
<div class="col-sm-8 text-center mt-3"> 
<div class="card">
               <div class="card-header">Add complain</div>
               @include('alert')
                <div class="card-body">
                    <form method="POST" action="{{route('addComplain')}}">
                        @csrf                       
                        <div class="row mb-3">
                        <div class="col-md-12">
                           <input type="hidden" name="id" value="id">
                              <input id="subject" type="text" class="form-control" placeholder="Subject" name="subject" value="" required>
                              <hr>
                          <input id="complain" type="textarea" class="form-control" placeholder="Enter your complain" name="complain" value="" required>
                        </div>
                      </div>  
                      <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-outline-primary">
                                    Submit
                                </button>
                            </div>
                        </div>     
                    </form>
                </div>
               </div>
         </div>

</div>
</div>
</body>
</html>
