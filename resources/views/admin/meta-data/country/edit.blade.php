@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons">
                        <h4 class="mb-4">Edit Country</h4>
                    </div>
                    <form action="{{ route('admin.meta-data.country.update',[$data->id]) }}" method="post">
                    @csrf
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">

                    <button class="btn btn-success mt-4" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
