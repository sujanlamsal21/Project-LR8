
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category
        </h2>


    </x-slot>
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
                  <h2 class="card-header">Category List</h2>
                  <div class="card-body">
                <table class="table">
                    <thead>

                      <tr>
                        <th scope="col">S No</th>
                        <th scope="col">User</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>

                    </thead>
                    <tbody>
                        {{-- @php($i=1) --}}
                        @foreach ($category as $list)
                      <tr>
                        <th scope="row">{{ $category->firstItem()+$loop->index }}</th>
                        <td>{{$list->user->name }}</td>
                        <td>{{$list->category_name }}</td>
                        <td>{{$list->created_at->diffForHumans() }}</td>
                        <td><a href="/category/edit/{{$list->id}}" class="btn btn-info">Edit</a>

                            <a href="/category/delete/{{$list->id}}" class="btn btn-danger">Trash</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $category->links() }}
                  </div>
              </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <h3 class="card-header">Create Category</h3>
                  <div class="card-body">
                    <form action="{{ route('category.add')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                        @error('category_name')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <button type="submit" name="create_category" class="btn btn-primary">Create Category</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</x-app-layout>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <div class="py-7">
  <div class="container">
          <div class="row">
            <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Trashed List</h2>
                <div class="card-body">
              <table class="table">
                  <thead>

                    <tr>
                      <th scope="col">S No</th>
                      <th scope="col">User</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>

                  </thead>
                  <tbody>
                      {{-- @php($i=1) --}}
                      @foreach ($trash as $list)
                    <tr>
                      <th scope="row">{{ $trash->firstItem()+$loop->index }}</th>
                      <td>{{$list->user->name }}</td>
                      <td>{{$list->category_name }}</td>
                      <td>{{$list->created_at->diffForHumans() }}</td>
                      <td><a href="/category/restore/{{$list->id}}" class="btn btn-info">Restore</a>

                          <a href="/category/pdelete/{{$list->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $trash->links() }}
                </div>
            </div>
            </div>


          </div>
      </div>
  </div>

