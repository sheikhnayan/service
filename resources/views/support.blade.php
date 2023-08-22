@extends('vendor_panel.layouts.main')

@section('title')
    Support & Feedback
@endsection

@section('content')
    <div class="row justify-content-center">
        <h3 class="text-dark mt-4 text-center">Apply for your new startup company</h3>
        <div class="col-md-8" style="margin-top: 3rem;">
            <form action="{{ route('support') }}" method="post">
                @csrf
                <select name="issue" class="form-control"
                    style="border-radius: 10px; background: #e0e0e0; font-weight: bold;" required>
                    <option selected disabled value="">Select an Issue</option>
                    <option value="technical">Technical</option>
                    <option value="payment">Payment</option>
                    <option value="other">Other</option>
                </select>

                <input style="border:unset; border-bottom: 2px solid black; font-size:17px;" type="text" name="email"
                    value="{{ Auth::user()->email }}" class="form-control mt-4">

                <input style="border:unset; border-bottom: 2px solid black; font-size:17px;" type="text"
                    name="description" placeholder="Describe The Issue..." class="form-control mt-4">

                    <button type="submit" class="btn btn-success mt-4" style="width: 100%">Submit</button>
            </form>

        </div>
    </div>
@endsection
