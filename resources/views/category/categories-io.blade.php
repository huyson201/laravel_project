@extends('dashboard')
@section('main')
<!-- MAIN -->
<div class="col p-4">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Import New categories</h1>
        </div>

        <div class="col-md-6 d-flex  align-items-center justify-content-center">
        </div>
    </div>
    <div class="message">
        <div class="text-success import mb-3">{{ session('messages') }}</div>
        <div class="text-danger import mb-3">{{ session('message') }}</div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import User Data</button>
            <a class="btn btn-warning" href="{{ route('categories.list') }}">List Categories</a>
        </form>
    </div>
</div><!-- Main Col END -->
@endsection