@extends('vendor_panel.layouts.main')

@section('title')
    Premium Users
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4 mt-4">
                <h4>All Premium Users</h4>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        @if ($item->vendor->subscription_id == 3)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td> <a href="{{ asset('storage/'.$item->vendor->document) }}" target="_blank" >Click here</a></td>
                            <td>
                                @if ($item->vendor->status == 1)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Active</span> 
                                @endif
                            </td>
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