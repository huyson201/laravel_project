@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">
        <div class="display-4">Import datas to "trainers" table</div>
        @if ($errors->has('file_import'))
            <p class="text-danger">{{ $errors->first('file_import') }}</p>
        @else
            @if ($errors->any())
                <p class="text-danger">Import error! File's row format invalid</p>
            @endif
        @endif

        <div class="card mx-auto mt-5" style="width: 40%">
            <h5 class="card-header font-weight-light text-center">Choose a file to import data</h5>
            <div class="card-body">
                <form action="{{ route('trainer.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="file" name="file_import" id="file_import" accept=".csv,.xlsx,.xls">
                        </div>
                        <div class="col-md-4"><button type="submit" class="btn btn-success">Import</button></div>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- Main Col END -->
@endsection
