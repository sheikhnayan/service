@extends('vendor_panel.layouts.main')

@section('title')
    Support & Feedback
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 3rem;">
            <h3 class="text-dark mt-4 text-center mb-4 pb-4">If you have any query/Faq email us at support@tbe-web.com</h3>
            <h3 class="text-dark mt-4 text-center mb-4 pb-4">Or fill up the form</h3>
            <form action="{{ route('support') }}" method="post" class="mt-4 ">
                @csrf
                <select name="issue" class="form-control"
                    style="border-radius: 10px; background: #e0e0e0; font-weight: bold;" required>
                    <option selected disabled value="">Select an Option</option>
                    <option value="Technical Issue">Technical Issue</option>
                    <option value="How To Guide">How To Guide</option>
                    <option value="Product feedback">Product feedback</option>
                    <option value="Complain">Complain</option>
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
