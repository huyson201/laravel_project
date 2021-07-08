@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">
        <!-- MAIN -->
        <div class="col p-4">

            <div class="display-4">Exporting rows from "trainers" table</div>
            <p class="text-danger">{{ session('export-message') }}</p>
            <form action="{{ route('trainer.export') }}" method="get">
                <section class="mt-5 ">
                    <h6 class="border-bottom pb-2">Export templates:</h6>

                    <h6>New template:</h6>
                    <input class="border rounded pl-2" type="text" name="file_name" id="file-name"
                        placeholder="Template name" value="{{ old('file_name') }}">
                    @error('file_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <h6 class="mt-5 border-bottom pb-2 ">Format:</h6>
                    <select style="width: 170px" class="border py-1 pl-2" name="export_format" id="export-format">
                        <option value="xlsx">Excel</option>
                        <option value="csv">CSV</option>
                    </select>
                    @error('export_format')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-success float-right">Create</button>
                </section>
            </form>
        </div>
    </div>
@endsection
