<x-student_-sidebar/>  
<div class="col-sm-8 text-center mt-3"> 
         <div class="card">
               <div class="card-header">Upload Project</div>
               @include('alert')
                <div class="card-body">
                    <form method="POST" action="{{route('uploadProject')}}" enctype="multipart/form-data">
                        @csrf                       
                        <div class="row mb-3">
                        <div class="col-md-12">
                           <input type="hidden" name="id" value="id">
                              <input id="projectTitle" type="text" class="form-control" placeholder="What's the title of your project?" name="projectTitle" value="" required>
                              <hr>
                          <input id="projectFile" type="file" class="form-control" placeholder="Choose your file" name="projectFile" value="" required>
                        </div>
                      </div>  
                      <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-outline-primary">
                                    Upload
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
