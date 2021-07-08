@extends('dashboard')
@if (isset($category))
@section('main')
<!-- MAIN -->
<div class="col p-4">
    <h1 class="display-4">Edit Category</h1>
    <p class="text-success"> {{ session('success') }}</p>
    <main class="signup-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.custom.edit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->category_id }}">
                                <div class="form-group mb-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="category_name" value="{{$category->category_name }}" required autofocus>
                                </div>
                                @error('category_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="d-grid mx-auto" style="display: flex; ;">
                                    <button type="submit" class="btn btn-dark btn-block" style="flex: 1;">Update</button>
                                    <a href="{{route('categories.list')}}" class="btn btn-secondary" style="flex: 1;margin-left: 10px;">
                                        <span class="menu-collapsed">Back to List</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div><!-- Main Col END -->
@endsection
@else
@section('main')
<!-- MAIN -->
<div class="col p-4">
    <h1 class="display-4">Add New Category</h1>
    <p class="text-success"> {{ session('success') }}</p>
    <main class="signup-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.custom.create') }}" method="GET">
                                @csrf
                                <input type="hidden" name="category_id">
                                <div class="form-group mb-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="category_name" required autofocus>
                                </div>
                                @error('category_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="d-grid mx-auto" style="display: flex; ;">
                                    <button type="submit" class="btn btn-dark btn-block" style="flex: 1;">Create</button>
                                    <a href="{{route('categories.list')}}" class="btn btn-secondary" style="flex: 1;margin-left: 10px;">
                                        <span class="menu-collapsed">Cancel</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div><!-- Main Col END -->
@endsection

@endif