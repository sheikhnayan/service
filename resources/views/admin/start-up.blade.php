@extends('vendor_panel.layouts.main')

@section('title')
    Support
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4">
                <h4>All Start-Up Pitches</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Industry</th>
                            <th>description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->indrustry->name }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection