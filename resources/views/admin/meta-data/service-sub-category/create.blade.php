@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons">
                        <h4 class="mb-4">Add Service Sub Category</h4>
                    </div>
                    <form action="{{ route('admin.meta-data.service-sub-category.store') }}" method="post">
                    @csrf
                    <label>Service Category</label>
                    <select name="service_category_id" class="form-control">
                        @foreach ($service_category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <label>Name</label>
                    <input type="text" name="name" class="form-control">

                    <button class="btn btn-success mt-4" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
