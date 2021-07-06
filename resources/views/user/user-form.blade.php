@extends('dashboard')
@if (isset($user))
    @section('main')
        <!-- MAIN -->
        <div class="col p-4">
            <h1 class="display-4">Edit User</h1>
            <p class="text-success"> {{ session('message') }}</p>
            <main class="signup-form mt-5">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('user.custom.edit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                        <div class="form-group mb-3">
                                            <label>User Name</label>
                                            <input type="text" id="username" class="form-control" name="user_name"
                                                value="{{ $user->user_name }}" required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>User Email</label>
                                            <input type="text" id="email" class="form-control" name="user_email"
                                                value="{{ $user->user_email }}" required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>User Password</label>
                                            <input type="text" id="password" class="form-control" name="user_password"
                                                value="{{ $user->user_password }}" required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Confirm User Password</label>
                                            <input type="text" id="cfpassword" class="form-control" name="user_cfpassword"
                                                value="{{ $user->user_password }}" required autofocus>
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Update</button>
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
            <h1 class="display-4">Add user</h1>
            <main class="signup-form mt-5">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('user.custom.create') }}" method="GET">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label>User Name</label>
                                            <input type="text" id="username" placeholder="User Name ..." class="form-control" name="user_name" required
                                                autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>User Email</label>
                                            <input type="text" id="email" placeholder="User Email ..." class="form-control" name="user_email" required
                                                autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>User Password</label>
                                            <input type="text" id="password" placeholder="User Password ..." class="form-control" name="user_password"
                                                required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Confirm User Password</label>
                                            <input type="text" id="cfpassword" placeholder="Confirm Password ..." class="form-control" name="user_cfpassword"
                                                required autofocus>
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Add</button>
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
