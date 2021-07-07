@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">

        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">List of all users</h1>
            </div>
            <div class="col-md-6 d-flex  align-items-center justify-content-center">
                <form action="{{ route('user.search') }}" method="get" style="margin-bottom: 0; width:80%;">
                    <div class="d-flex">
                        <input type="text" name="k" id="" class="form-control" placeholder="Enter your search key..."
                            value="{{ request()->input('k') }}" aria-describedby="helpId">

                        <select data-filter="make" name="search_by" class="filter-make">
                            <option value="user_name">Username</option>
                            <option value="user_email" @if (isset($search))  @if ($search==='user_email') selected @endif @endif>Email</option>
                        </select>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="message">
            <div class="text-success delete mb-3">{{ session('message') }}</div>
            <div class="text-success delete mb-3">{{ session('delete-message') }}</div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->user_id }}</th>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->user_email }}</td>
                        <td>{{ $user->user_password }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('user.edit', [$user->user_id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('user.delete', [$user->user_id]) }}" class="btn btn-danger"
                                onclick="return confirm('are you sure want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div><!-- Main Col END -->
@endsection
