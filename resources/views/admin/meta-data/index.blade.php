@extends('vendor_panel.layouts.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Country List</h4>
                        <a href="{{ route('admin.meta-data.country.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Country</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($countries as $key => $country)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.country.edit',[$country->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.country.destroy',[$country->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">State List</h4>
                        <a href="{{ route('admin.meta-data.state.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($states as $key => $state)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $state->country->name }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.state.edit',[$state->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.state.destroy',[$state->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Product Category List</h4>
                        <a href="{{ route('admin.meta-data.product-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Product Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($product_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.product-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.product-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Product SubCategory List</h4>
                        <a href="{{ route('admin.meta-data.product-sub-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Product Category</th>
                            <th>Product Sub Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($product_sub_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->product_category->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.product-sub-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.product-sub-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Service Category List</h4>
                        <a href="{{ route('admin.meta-data.service-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Service Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($service_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.service-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.service-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Service SubCategory List</h4>
                        <a href="{{ route('admin.meta-data.service-sub-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Service Category</th>
                            <th>Service Sub Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($service_sub_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->service_category->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.service-sub-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.service-sub-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Food Menu Category List</h4>
                        <a href="{{ route('admin.meta-data.food-menu-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Food Menu Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($food_menu_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.food-menu-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.food-menu-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">Start Up Category List</h4>
                        <a href="{{ route('admin.meta-data.start-up-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Start Up Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($start_up_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.start-up-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.start-up-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 mt-4">
                    <div class="buttons mb-4">
                        <h4 class="float-left" style="padding-top: 0.5rem;">NPO Category List</h4>
                        <a href="{{ route('admin.meta-data.npo-category.create') }}" class="btn btn-success float-right">Add New</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>NPO Category</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($npo_category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.meta-data.npo-category.edit',[$item->id]) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.meta-data.npo-category.destroy',[$item->id]) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
