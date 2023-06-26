@extends('vendor_panel.layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-dark mt-4 text-center">Apply for your new startup company</h3>
            <div class="card mt-4" style="background: #f8f9ff">
                <form action="{{ route('user.start-up') }}" method="post" class="p-4">
                @csrf
                    <input style="background: #f8f9ff; border-color:transparent; border-bottom-color: #000" name="name" value="{{ Auth::user()->name }}" type="text" class="form-control mb-4">
                    <input style="background: #f8f9ff; border-color:transparent; border-bottom-color: #000" name="email" value="{{ Auth::user()->email }}" type="text" class="form-control mb-4">
                    <input style="background: #f8f9ff; border-color:transparent; border-bottom-color: #000" name="phone" value="{{ Auth::user()->phone }}" type="text" class="form-control mb-4">

                    <select style="background: #f8f9ff; border-color:transparent; border-bottom-color: #000" name="indrusty_id" class="form-control mb-4">
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <textarea style="background: #f8f9ff;" name="description" class="form-control mb-4" placeholder="describe your business idea..."></textarea>

                    <button style="width: 100%" class="btn btn-success mt-4 mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
