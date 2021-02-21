@extends('admin.admin_master');

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-header">Add About</h3>
              <div class="card-body">
                <form method="post" action="{{ route('about.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" value="" name="title" placeholder="Slider title">
                      @error('title')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Short Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" value="" name="short_desc" rows="3"></textarea>
                      @error('short_desc')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Long Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" value="" name="long_desc" rows="3"></textarea>
                        @error('long_desc')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Add About</button>

                  </form>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
