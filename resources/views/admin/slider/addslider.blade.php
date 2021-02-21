@extends('admin.admin_master');

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-header">Add Slider</h3>
              <div class="card-body">
                <form method="post" action="{{ route('slider.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value="" name="title" placeholder="Slider title">
                      @error('title')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Slider Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" value="" name="description" rows="3"></textarea>
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
                    </div><br>
                    <button type="submit" name="submit" class="btn btn-primary">Add Slider</button>

                  </form>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
