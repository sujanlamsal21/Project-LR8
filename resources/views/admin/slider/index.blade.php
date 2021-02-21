@extends('admin.admin_master');

@section('admin')

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-7">
    <div class="container">
            <div class="row">
              <div class="col-md-12">
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
                <h4 style="display: flex;">Home Slider</h4><a href="{{route('slider.add')}}" class="btn btn-primary" style="width:100px; float:right;">Add Slider</a>
                  <h2 class="card-header" style="dislpay:flex;">Slider Details</h2>

                  <div class="card-body">
                <table class="table">
                    <thead>

                      <tr>
                        <th scope="col" width="5%">S No</th>
                        <th scope="col"width="12%">Title</th>
                        <th scope="col"width="30%">Description</th>
                        <th scope="col"width="10%">Slider Images</th>
                        {{-- <th scope="col">Created At</th> --}}
                        <th scope="col"width="15%">Action</th>
                      </tr>

                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($sliders as $slide)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$slide->title }}</td>
                        <td>{{$slide->description }}</td>
                        <td><img src="{{asset($slide->slider_image)}}" alt="" height="100" width="100"></td>
                        {{-- <td>{{$brand->created_at->diffForHumans() }}</td> --}}
                        <td><a href="/slider/edit/{{$slide->id}}" class="btn btn-info">Edit</a>

                            <a href="/slider/delete/{{$slide->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- {{ $sliders->links() }} --}}
                  </div>
              </div>
              </div>
              {{-- <div class="col-md-4">
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
              </div> --}}

            </div>
        </div>
    </div>

@endsection
