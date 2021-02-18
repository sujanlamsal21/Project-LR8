
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Update Category
        </h2>


    </x-slot>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <div class="py-7">
    <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <h3 class="card-header">Edit Category</h3>
                  <div class="card-body">
                    <form action="{{ route('category.update', ['id' => $category->id])}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" value="{{$category->category_name}}" placeholder="Enter Category">
                        @error('category_name')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <button type="submit" name="edit_category" class="btn btn-primary">Update Category</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
</x-app-layout>
