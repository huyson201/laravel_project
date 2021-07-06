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
            {{-- <p class="text-success"> {{ session('success') }}</p> --}}
            {{-- <main class="signup-form mt-5">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('user.custom.create') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="user_id">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name..." id="name" class="form-control"
                                                name="user_name" required autofocus>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="name">Web</label>
                                            <input type="text" placeholder="Web..." id="web" class="form-control"
                                                name="user_web" required autofocus>
                                        </div>
                                        @error('user_web')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" placeholder="Address..." id="address" class="form-control"
                                                name="user_address" required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" placeholder="Phone..." id="phone" class="form-control"
                                                name="user_phone" required autofocus>
                                        </div>
                                        @error('user_phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Code</label>
                                            <input type="text" placeholder="Code..." id="code" class="form-control"
                                                name="user_code" required autofocus>
                                        </div>
                                        @error('user_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            {!! Form::select('category_id', $categories, $categories, ['multiple' => 'multiple', 'name' => 'categories[]', 'class' => 'form-control', 'id' => 'category','required']) !!}
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
            </main> --}}
        </div><!-- Main Col END -->
    @endsection

@endif
