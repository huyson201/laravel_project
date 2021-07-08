@extends('dashboard')
@section('main')
<!-- MAIN -->
<div class="col p-4">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">List of all categories</h1>
        </div>

        <div class="col-md-6 d-flex  align-items-center justify-content-center">

            <form action="{{ route('categories.search') }}" method="get" style="margin-bottom: 0;">
                {{-- <div class="d-flex">
                    {!! Form::select('category_id', $categories, (int)request()->input('category_id'), ['class' => 'form-control', 'id' => 'category']) !!}
                    {!! Form::select('category_id', $categories, (int)request()->input('category_id'), ['class' => 'form-control', 'id' => 'category']) !!}
                </div> --}}
                <div class="d-flex">
                    <input type="text" name="k" id="" class="form-control" placeholder="Enter your search key..." value="{{ request()->input('k') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="message">
        <div class="text-success delete mb-3">{{ session('message') }}</div>
    </div>
    <table class="table table-bordered" style="text-align: center;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cate as $category)
            <tr>
                <th scope="row">{{ $category->category_id }}</th>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('categories.edit', [$category->category_id]) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('categories.deleteconfirm', [$category->category_id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $cate->links() }}    
     <!-- <a href="{{ route('categories.deleteconfirm', [-1]) }}" class="btn btn-danger">Delete All Categories</a> -->
</div><!-- Main Col END -->
@endsection