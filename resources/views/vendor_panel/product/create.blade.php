@extends('vendor_panel.layouts.main')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('vendor.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" required width="100%" height="122px" style="display: none" id="image" name="image">
                        <label style="width:100%; height:122px; border-radius: 22px; font-weight: 500; cursor: pointer"
                                    for="image" class="text-center bg-light" id="label">
                                    <img class="img-fluid" src="{{ asset('vendor_panel/edit_image.png') }}" id="edit_button" style="position: absolute; right: 26px; cursor: pointer; display:none">
                                    <img class="img-fluid" style="height:122px !important; display: none" src="" id="imgPreview" alt="" width="100%">
                                    <a class="btn btn-success text-light mb-1" id="add_button" style="border-radius: 50%; margin-top: 2rem;">+</a> 
                                    {{-- <p> Upload Documents (jpeg/png/PDF) </p> --}}
                                </label> <br>
                        <p style="color: #000; padding-bottom: 1rem; font-size:12px; text-align:left;">Recommended Banner Size 300x150 Pixel</p> 


                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product
                            Name:</label>
                        <input type="text" class="form-control" placeholder="Add Product Name..."
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" name="name" required>

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                        <input type="text" class="form-control" placeholder="Write about your Product..."
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;" name="description" required>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Category: </label>
                            @php
                                $category = DB::table('product_categories')->get();
                            @endphp
                            <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="category_id" id="category_id" class="form-control" required>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Sub Category: </label>
                            <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="sub_category_id" id="sub_category_id" class="form-control" required>
                            </select>
                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Product Status: </label>
                            <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="status" id="" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Price: </label>
                            <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="price" type="number" class="form-control" placeholder="00.00 $" required>
                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Model Name: </label>
                            <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="model" id="" class="form-control" placeholder="Type here...">

                        </div>

                        <div class="input-group mt-4">
                            <label style="width: 60%; font-weight:bold">Color: </label>
                            <input style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                name="color" id="" class="form-control" placeholder="Type here...">

                        </div>

                        <label class="mt-4"
                            style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product
                            Link:</label>
                        <input name="link" type="url" class="form-control" placeholder="Product Purchase URL"
                            style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                        <button type="submit" class="btn btn-success mt-4 logout-profile"> Add Product</button>
                    </form>
                </div>
            </div>
        </div>




    </div>
@endsection

@section('js')
<script>
    $('#category_id').on('click', function(){
        val = $('#category_id').val();

        $.ajax({
        url: "/vendor/product/get-product-sub-category/"+val,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            htmls = ``;

            res.forEach(element => {
                html = ` <option value="`+element.id+`">`+element.name+`</option>`;

                htmls += html;
            });

            $('#sub_category_id').html(htmls);
        }
    });
    });
</script>

<script>
    $(document).ready(() => {
        $("#image").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview")
                    .attr("src", event.target.result);

                    $("#imgPreview")
                    .css("display", 'block');

                    $('#add_button').css('display','none')

                    $('#edit_button').css('display','block')
                };
                reader.readAsDataURL(file);


            }
        });
    });
</script>
@endsection
