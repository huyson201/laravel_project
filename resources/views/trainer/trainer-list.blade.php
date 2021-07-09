@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">

        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">List of all trainers</h1>
            </div>
            <div class="col-md-6 d-flex  align-items-center justify-content-center">
                <form action="{{ route('trainer.search') }}" method="get" style="margin-bottom: 0; width:80%;">
                    <div class="d-flex">
                        <input type="text" name="q" id="" class="form-control" placeholder="Enter your search key..."
                            value="{{ request()->input('q') }}" aria-describedby="helpId">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </div>
                    @error('q')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </form>
            </div>
        </div>
        <div class="message">
            <div class="text-success delete mb-3">{{ session('import-message') }}</div>
            <div class="text-success delete mb-3">{{ session('add-message') }}</div>
            <div class="text-success delete mb-3">{{ session('delete-message') }}</div>
        </div>
        <div class="mb-3"><a href="{{ route('trainer.list') }}" class="btn btn-success">Trainers list</a> <a
                href="{{ route('trainer.create') }}" class="btn btn-success">Add new</a></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Trainer Name</th>
                    <th scope="col">Trainer Phone</th>
                    <th scope="col">Trainer Address</th>
                    <th scope="col">Company</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainers as $trainer)
                    <tr>
                        <th scope="row">{{ $trainer->trainer_id }}</th>
                        <td>{{ $trainer->trainer_name }}</td>
                        <td>{{ $trainer->trainer_phone }}</td>
                        <td>{{ $trainer->trainer_address }}</td>
                        @if (isset($trainer->company))
                            <td><a href="{{route('company.detail', [$trainer->company->company_id])}}">{{ $trainer->company->company_name }}</a></td>
                        @else
                            <td></td>
                        @endif
                        <td class="text-nowrap">
                            <a href="{{ route('trainer.edit', [$trainer->trainer_id]) }}"
                                class="btn btn-success">Edit</a>
                            <a href="{{ route('trainer.delete', [$trainer->trainer_id]) }}" class="btn btn-danger"
                                onclick="return confirm('are you sure want to delete?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $trainers->links() }}
    </div><!-- Main Col END -->
@endsection
