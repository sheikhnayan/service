@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons">
                        <h4 class="mb-4">Edit NPO Category</h4>
                    </div>
                    <form action="{{ route('admin.meta-data.npo-category.update',[$data->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Change Image</label>
                    <input type="file" name="image" class="form-control">

                    <img src="{{ asset('storage/'.$data->image) }}" alt="" class="img-fluid mt-4 mb-4">
                    <br>

                    <label>Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">

                    <button class="btn btn-success mt-4" type="submit" style="background: #000">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
