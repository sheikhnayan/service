@extends('vendor_panel.layouts.main')

@section('title')
    NPO
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4">
                <h4>All NPO</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        @if ($item->vendor->business_type == 'non-profit')

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit',[$item->id]) }}" class="btn btn-primary">Edit Profile</a>
                                <a href="{{ route('admin.user.delete',[$item->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                            
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection