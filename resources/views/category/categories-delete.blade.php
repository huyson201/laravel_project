@extends('dashboard')
@if (isset($category))
@section('main')
<!-- MAIN -->
<div class="col p-4">
    <h1 class="display-4">Confirm Delete Category</h1>
    <h2>Are You Sure about delete ? </h2>
    <main class="signup-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <table class="table table-bordered" style="text-align: center;">
                    <thead >
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $category->category_id }}</th>
                            <td>{{ $category->category_name }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                           
                            <a href="{{route('categories.delete', [$category->category_id])}}" class="btn btn-danger">
                                <span class="menu-collapsed">yes</span>
                            </a>
                            <a href="{{route('categories.list')}}" class="btn btn-secondary">
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