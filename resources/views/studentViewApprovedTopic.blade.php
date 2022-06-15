<x-student_-sidebar/>  
         <div class="col-sm-9 text-center mt-5"> 

            @include('alert')
            @if($topic)
            <h3>Hi {{session('last_name')}}, Your approved topic is {{$topic}}</h3>
            @endif
         </div>
</div>
</div>
</body>
</html>
