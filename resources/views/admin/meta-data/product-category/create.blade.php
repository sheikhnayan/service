@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons">
                        <h4 class="mb-4">Add Product Category</h4>
                    </div>
                    <form action="{{ route('admin.meta-data.product-category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required>
                     <br>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">

                    <button class="btn btn-success mt-4" type="submit" style="background: #000">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
