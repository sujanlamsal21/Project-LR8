@extends('admin.admin_master')

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
            <h4 style="display: flex;">Contact Page</h4><a href="/contact/addpage" class="btn btn-primary" style="width:100px; float:right;">Add About</a>
              <h2 class="card-header" style="dislpay:flex;">Contact Details</h2>

              <div class="card-body">
            <table class="table">
                <thead>

                  <tr>
                    <th scope="col" width="10%">S No</th>
                    <th scope="col"width="25%">Address</th>
                    <th scope="col"width="20%">Email</th>
                    <th scope="col"width="20%">Phone No</th>
                    {{-- <th scope="col">Created At</th> --}}
                    <th scope="col"width="20%">Action</th>
                  </tr>

                </thead>
                <tbody>
                     @php($i=1)
                    @foreach ($contactvalue as $about)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{$about->address }}</td>
                    <td>{{$about->email}}</td>
                    <td>{{$about->phoneno}}</td>
                    {{-- <td>{{$brand->created_at->diffForHumans() }}</td> --}}
                    <td><a href="/contact/edit/{{$about->id}}" class="btn btn-info">Edit</a>

                        <a href="/contact/delete/{{$about->id}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- {{ $sliders->links() }} --}}
              </div>
          </div>
          </div>


        </div>
    </div>
</div>

@endsection
