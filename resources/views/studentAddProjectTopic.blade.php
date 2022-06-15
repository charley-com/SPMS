<x-student_-sidebar/>  
<div class="col-sm-8 text-center mt-3"> 
 <div class="card">
                <div class="card-header">Add Topics</div>
                @include('alert')
                <div class="card-body">
                    <form method="POST" action="{{route('addProjectTopic')}}">
                        @csrf                       
                        <div class="row mb-3">
                        <label  class="text-muted">Topic 1</label>
                        <div class="col-md-6">
                           <input type="hidden" name="id" value="id">
                              <input id="topic1" type="text" class="form-control" placeholder="Enter your first topic here" name="topic1" value="" required>
                        </div>
                        <div class="col-md-6">                  
                                <textarea id="desc1" type="text" class="form-control" placeholder="What's the description for your first topic?" name="desc1" value="" required></textarea>
                        </div>
                      </div>   
                      <hr>       
                      <div class="row mb-3">
                        <label  class="text-muted">Topic 2</label>
                        <div class="col-md-6">
                              <input id="topic2" type="text" class="form-control" placeholder="Enter your second topic here" name="topic2" value="" required>
                        </div>
                        <div class="col-md-6">                  
                                <textarea id="desc2" type="text" class="form-control" placeholder="What's the description for your second topic?" name="desc2" value="" required></textarea>
                        </div>
                      </div>   
                      <hr>   
                      <div class="row mb-3">
                        <label  class="text-muted">Topic 3</label>
                        <div class="col-md-6">
                              <input id="topic3" type="text" class="form-control" placeholder="Enter your third topic here" name="topic3" value="" required>
                        </div>
                        <div class="col-md-6">                  
                                <textarea id="desc3" type="text" class="form-control" placeholder="What's the description for your third topic?" name="desc3" value="" required></textarea>
                        </div>
                      </div>            
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-outline-primary">
                                   Add
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
