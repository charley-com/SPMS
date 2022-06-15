<x-admin_sidebar/>  
         <div class="col-sm-6 offset-md-1 text-center mt-5"> 
         @include('alert')
            <h3>Upload Staff</h3>
            <p class="text-muted">(Please upload a CSV file)</p>
                    <form method="POST" action="{{route('uploadStaff')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="staff" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="staff" type="file" class="form-control @error('staff') is-invalid @enderror" name="staff" required>

                                @error('staff')
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
