<x-coordinator_sidebar/>  
<div class="col-sm-6 offset-md-1 text-center mt-5"> 
            <h3>Upload Students</h3>
            <p class="text-muted">(Please upload a CSV file)</p>
            @include('alert')
                    <form method="POST" action="{{route('coordUploadStudent')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="student" type="file" class="form-control @error('student') is-invalid @enderror" name="student" required>

                                @error('student')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
         </div>
</div>
</div>
</body>
</html>
