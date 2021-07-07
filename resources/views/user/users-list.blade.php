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
                    <label> Search by: </label>
                    <div class="d-flex">
                        <select data-filter="make" name="search_by" class="filter-make filter form-control"
                            style="width:50%;margin-right:5px;">
                            <option value="user_name">Username</option>
                            <option value="user_email" @if (isset($search))  @if ($search==='user_email')
                                selected @endif @endif>Email</option>
                        </select>
                        <input type="text" name="k" id="" class="form-control" placeholder="Enter your search key..."
                            value="{{ request()->input('k') }}" aria-describedby="helpId">
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
        <div class="container" style="width:85%;">
            <form action="{{ route('user.list') }}" method="get" style="margin-bottom: 0; width:80%;">
                <div class="d-flex">
                   <input type="hidden" name="keyword" value=@if (isset($key)) {{$key}} @endif>
                   <input type="hidden" name="keyword_by" value=@if (isset($search)) {{$search}} @endif>
                    <select data-filter="make" name="sort" class="filter-make filter form-control"
                        style="width:20%;margin-bottom:5px;margin-right:5px;">
                        <option value="user_id">ID</option>
                        <option value="user_name" @if (isset($sort))  @if ($sort==='user_name')
                        selected @endif @endif>Username</option>
                        <option value="user_email" @if (isset($sort))  @if ($sort==='user_email')
                        selected @endif @endif>Email</option>
                    </select>
                    <select data-filter="make" name="sort_type" class="filter-make filter form-control"
                        style="width:20%;margin-bottom:5px;margin-right:5px;">
                        <option value="DESC">DESC</option>
                        <option value="ASC" @if (isset($sort_type))  @if ($sort_type==='ASC')
                        selected @endif @endif>ASC</option>
                    </select>
                    <button type="submit" class="btn btn-primary" style="height: 38px">Sort</button>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        {{-- <th scope="col">User Password</th> --}}
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->user_id }}</th>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->user_email }}</td>
                            <td>{{ $user->created_at }}</td>
                            {{-- <td>{{ $user->user_password }}</td> --}}
                            <td class="text-nowrap">
                                <a href="{{ route('user.edit', [$user->user_id]) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('user.delete', [$user->user_id]) }}" class="btn btn-danger"
                                    onclick="return confirm('are you sure want to delete?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div><!-- Main Col END -->
@endsection
