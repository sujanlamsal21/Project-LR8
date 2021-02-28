@extends('admin.admin_master')

@section('admin')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="py-7">
<div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <h3 class="card-header">Update Password</h3>
              <div class="card-body">
                <form method="post" action="{{ route('update.password') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Old Password</label>
                      <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">
                      @error('oldpassword')
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">New Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="New Password">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Confirm New Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter New Password Again">
                      </div>

                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>

                  </form>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection
