@extends('admin.admin_master')

@section('admin')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-7">
    <div class="container">
            <div class="row">
              <div class="col-md-8">
                  @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                  @endif
                  @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>{{ session('error')}}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                    @endif
                    @foreach($multiple as $images)

                    <div class="col-md-4 mt-5">
                        <div class="card">
                  <img src="{{ asset($images->multiple_image) }}" height="200" width="200" alt="">

                  <div class="card-body">
                  </div>
                        </div>
              </div>
              @endforeach
              </div>
              <div class="col-md-4">
                <div class="card">
                  <h3 class="card-header">Upload Multiple Images</h3>
                  <div class="card-body">
                    <form action="{{ route('multiple.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" name="multiple_image[]" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                        @error('multiple_image')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <button type="submit" name="create_brand" class="btn btn-primary">Upload</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>

@endsection
