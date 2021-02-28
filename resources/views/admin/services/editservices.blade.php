@extends('admin.admin_master')

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-header">Edit Services</h3>
              <div class="card-body">
                <form method="post" action="{{ route('services.edit', $serviceseditdata->id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Title</label>
                      <input type="text" class="form-control" value="{{$serviceseditdata->title}}" name="title" placeholder="Slider title">
                      @error('title')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea class="form-control" name="description" rows="3">{{$serviceseditdata->description}}</textarea>
                      @error('description')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Icon</label>
                        <select class="form-select" name="icon" aria-label="Default select example">
                            <option selected>{{$serviceseditdata->icon}}</option>
                            <option >file</option>
                            <option >tachometer</option>
                            <option>slideshow</option>
                            <option>arch</option>
                            <option>dribbble</option>
                          </select>
                        @error('icon')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Add Services</button>

                  </form>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
