@extends('admin.admin_master');

@section('admin')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-7">
    <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <h3 class="card-header">Edit Brand</h3>
                  <div class="card-body">
                    <form action="{{ route('brand.update', ['id' => $brand->id])}}" method="post" enctype="multipart/form-data ">
                      @csrf
                      <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" value="{{$brand->brand_name}}">
                        @error('brand_name')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control" name="brand_updatedimage">
                        @error('brand_image')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div>
                          <img src="{{ asset($brand->brand_image)}}" alt="" height="200" width="200">
                      </div>
                      <button type="submit" name="edit_brand" class="btn btn-primary">Update Brand</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
@endsection
