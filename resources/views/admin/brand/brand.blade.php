@extends('admin.admin_master');

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
              <div class="card">
                  <h2 class="card-header">Brand List</h2>
                  <div class="card-body">
                <table class="table">
                    <thead>

                      <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>

                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($brands as $brand)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$brand->brand_name }}</td>
                        <td><img src="{{asset($brand->brand_image)}}" alt="" height="100" width="100"></td>
                        <td>{{$brand->created_at->diffForHumans() }}</td>
                        <td><a href="/brand/edit/{{$brand->id}}" class="btn btn-info">Edit</a>

                            <a href="/brand/delete/{{$brand->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $brands->links() }}
                  </div>
              </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <h3 class="card-header">Create Brand</h3>
                  <div class="card-body">
                    <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                        @error('brand_name')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('brand_image')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <button type="submit" name="create_brand" class="btn btn-primary">Create Brand</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>

@endsection
