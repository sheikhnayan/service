@extends('vendor_panel.layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('user.review') }}" method="post">
                @csrf
                <div class="card" style="background: #f8f9ff; margin-top: 10rem; margin-bottom: 10rem;">
                    <div class="row">
                        <div class="col-md-5 p-4">
                            <img src="{{ asset('storage/'.$data->image) }}" class="img-fluid">
                        </div>
                        <div class="col-md-7 p-4">
                            <h3 class="text-dark" style="margin-top: 2rem; text-align: center;">{{ $data->name }}</h3>
                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                            <input type="hidden" name="type" value="{{ $type }}">
                            <div class="star-rating" style="margin:auto; margin-top: 1rem; border: unset; font-size: 30px;">
                                <input type="radio" id="5-stars" name="rating" value="5" />
                                <label for="5-stars" class="star">&#9733;</label>
                                <input type="radio" id="4-stars" name="rating" value="4" />
                                <label for="4-stars" class="star">&#9733;</label>
                                <input type="radio" id="3-stars" name="rating" value="3" />
                                <label for="3-stars" class="star">&#9733;</label>
                                <input type="radio" id="2-stars" name="rating" value="2" />
                                <label for="2-stars" class="star">&#9733;</label>
                                <input type="radio" id="1-star" name="rating" value="1" />
                                <label for="1-star" class="star">&#9733;</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="message" cols="100%" rows="10" class="form-control p-4 text-dark" style="background: #f8f9ff;"
                                placeholder="Write a review..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button class="btn btn-success" style="width: 100%">Submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
