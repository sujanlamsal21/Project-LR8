@extends('admin.admin_master')

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-header">Add Contact</h3>
              <div class="card-body">
                <form method="post" action="/contact/add">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">address</label>
                      <input type="text" class="form-control" value="" name="address" placeholder="Addresss">
                      @error('address')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">email</label>
                        <input type="email" class="form-control" value="" name="email" placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Phone NO</label>
                        <input type="text" class="form-control" value="" name="phoneno" placeholder="Phone no">
                        @error('phoneno')
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
