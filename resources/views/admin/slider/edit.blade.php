@extends('admin.admin_master');

@section('admin')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-7">
    <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h3 class="card-header">Edit Slider</h3>
                  <div class="card-body">
                    <form method="post" action="{{ route('slider.update', $data->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$data->slider_image}}">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Title</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$data->title}}" name="title" placeholder="Slider title">
                          @error('title')
                              <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Slider Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$data->description}}</textarea>

                          @error('description')
                              <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Slider Image</label>
                            <input type="file" class="form-control-file" name="slider_image" id="exampleFormControlFile1">

                            @error('slider_image')
                              <div class="alert alert-danger">{{$message}}</div>
                          @enderror

                          <div>
                            <img src="{{asset($data->slider_image)}}" alt="" height="200" width="400">
                        </div>
                        </div><br>
                        <button type="submit" name="submit" class="btn btn-primary">Edit Slider</button>

                      </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
@endsection
