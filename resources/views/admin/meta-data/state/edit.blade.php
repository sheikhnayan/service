@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons">
                        <h4 class="mb-4">Edit State</h4>
                    </div>
                    <form action="{{ route('admin.meta-data.state.update',[$data->id]) }}" method="post">
                    @csrf
                    <label>Country</label>
                    <select name="country_id" class="form-control">
                        @foreach ($country as $item)
                            <option {{ $data->country_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">

                    <button class="btn btn-success mt-4" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
