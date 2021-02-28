@extends('admin.admin_master')

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-12">

          <div class="card">

              <h2 class="card-header" style="dislpay:flex;">Contact Details</h2>

              <div class="card-body">
            <table class="table">
                <thead>

                  <tr>
                    <th scope="col" width="10%">S No</th>
                    <th scope="col"width="15%">Name</th>
                    <th scope="col"width="20%">Email</th>
                    <th scope="col"width="20%">Subject</th>
                    <th scope="col"width="30%">Message</th>
                  </tr>

                </thead>
                <tbody>
                     @php($i=1)
                    @foreach ($contactdetails as $about)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{$about->name }}</td>
                    <td>{{$about->email}}</td>
                    <td>{{$about->subject}}</td>
                    <td>{{$about->message}}</td>
                    {{-- <td>{{$brand->created_at->diffForHumans() }}</td> --}}
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
