@extends('vendor_panel.layouts.main')

@section('title')
    Edit Event
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form action="{{ route('vendor.event.update', [$data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <label for="image" style="width: 100%;">
                            <img class="img-fluid" src="{{ asset('storage/' . $data->image) }}" width="100%" height="122px">
                        </label>
                        <br>
                        <input type="file" name="image" id="image" style="display: none;">


                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Name:</label>
                        <input name="name" type="text" class="form-control" value="{{ $data->name }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                        <input name="description" type="text" class="form-control" value="{{ $data->description }}"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <div class="input-group mt-4">
                            <label
                                style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;">
                                Event Type: </label>
                            <input name="type" value="virtual" type="radio" id="virtual"
                                {{ $data->type == 'virtual' ? 'checked' : '' }}>
                            <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;"
                                for="virtual">Virtual</label>
                            <input name="type" value="physical" type="radio" id="physical"
                                {{ $data->type == 'physical' ? 'checked' : '' }}>
                            <label style="width: 20%; font-weight:bold; margin-left: 1rem; margin-top: .5rem;"
                                for="physical">Physical</label>
                        </div>

                        <div class="input-group mt-4">
                            <label
                                style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold; margin-top:0.5rem; margin-right: 1rem;">
                                Date: </label>
                            <input name="date" type="date" value="{{ $data->date }}" class="form-control">
                        </div>

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event Link:</label>
                        <input name="link" value="{{ $data->link }}" type="url" class="form-control"
                            placeholder="Event Link" style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Event
                            Location:</label>
                        <input name="location" value="{{ $data->location }}" type="text" class="form-control"
                            placeholder="Event Location"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <button href="/" class="btn btn-success mt-4 logout-profile"> Save</button>
                    </form>

                </div>
            </div>
        </div>




    </div>
@endsection
