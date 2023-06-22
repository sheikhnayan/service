@extends('vendor_panel.layouts.main')

@section('title')
    Support
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4">
                <h4>All Support Request</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>issue</th>
                            <th>description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->issue }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection