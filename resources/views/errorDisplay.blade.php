<x-student_-sidebar/>  
         <div class="col-sm-9 text-center mt-5 text-danger"> 
             @if('topicUpload')
            <h3>You need a project code to upload</h3>
            @elseif('projectUpload')
            <h3>You need a project code to upload your project</h3>
            @endif
         </div>
</div>
</div>
</body>
</html>