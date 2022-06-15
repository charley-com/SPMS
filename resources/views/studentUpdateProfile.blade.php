<x-student_-sidebar/>  
<div class="col-sm-8 text-center mt-3"> 
         <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                @include('alert')
                    <form method="POST" action="{{route('student.update', session('student_id'))}}">
                        @csrf
                        @method('PUT')
                       
                        <div class="row mb-3">
                        <div class="col-md-6">
                             <input type="hidden" name="student_id" value="{{$student['id']}}">
                              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" name="last_name" value="{{ $student['last_name'] }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6">                  
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Middle Name" name="middle_name" value="{{ $student['middle_name'] }}" required>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" name="first_name" value="{{ $student['first_name'] }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6">                  
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $student['email'] }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6">
                              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ $student['phone'] }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6">                  
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <hr>
                      <label class="text-muted">Areas of Interest</label>

                      <div class="row mb-3">
                        <div class="col-md-6">
                              <input id="first_choice" type="text" class="form-control @error('first_choice') is-invalid @enderror" placeholder="First Choice" name="first_choice" value="{{ $student['first_choice'] }}" required>
                                @error('first_choice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6">                  
                                <input id="second_choice" type="text" class="form-control @error('second_choice') is-invalid @enderror" placeholder="Second CHoice" name="second_choice" value="{{ $student['second_choice'] }}" required>

                                @error('second_choice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-12">
                              <input id="third_choice" type="text" class="form-control @error('third_choice') is-invalid @enderror" placeholder="Third Choice" name="third_choice" value="{{ $student['third_choice'] }}" required>
                                @error('third_choice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                     
                      </div>


                     
                                               

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Update') }}
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
