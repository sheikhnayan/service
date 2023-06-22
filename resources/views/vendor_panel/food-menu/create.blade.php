 @extends('vendor_panel.layouts.main')

 @section('title')
     Add Food Menu
 @endsection

 @section('content')
     <div class="content-wrapper">
         <div class="content">
             <div class="row justify-content-center">
                 <div class="col-md-3">
                     <form action="{{ route('vendor.food-menu.store') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <input type="file" width="100%" height="122px" style="display: none" id="image"
                             name="image">
                         <label style="width:100%; height:122px; border-radius: 22px; font-weight: 500; padding-top: 2rem;"
                             for="image" class="text-center bg-light">
                             <a class="btn btn-success text-light mb-1" style="border-radius: 50%">+</a> <br>
                             Upload Food Image
                         </label> <br>

                         <label class="mt-4"
                             style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Food Name:</label>
                         <input type="text" name="name" class="form-control" placeholder="Add Food Name..."
                             style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                         <label class="mt-4"
                             style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Description:</label>
                         <input type="text" name="description" class="form-control"
                             placeholder="Write about your Food..."
                             style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                         <div class="input-group mt-4">
                             <label style="width: 60%; font-weight:bold">Caregory: </label>
                             @php
                                 $category = DB::table('food_menu_categories')->get();
                             @endphp
                             <select style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                 name="category_id" id="category_id" class="form-control" required>
                                 @foreach ($category as $item)
                                     <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 @endforeach
                             </select>
                         </div>

                         <div class="input-group mt-4">
                             <label style="width: 60%; font-weight:bold">Price: </label>
                             <input name="price"
                                 style="width: 40%; border-radius: 10px; background: #e0e0e0; font-weight: bold;"
                                 name="" id="" class="form-control" placeholder="00.00 $">
                         </div>

                         <label class="mt-4"
                             style="font-size: 15px;font-family:Montserrat; color:#000; font-weight:bold">Product
                             Link:</label>
                         <input name="link" type="text" class="form-control" placeholder="Food Booking URL"
                             style="border:unset; border-bottom: 2px solid black; font-size:17px;">

                         <button type="submit" class="btn btn-success mt-4 logout-profile"> Add Food</button>
                     </form>

                 </div>
             </div>
         </div>




     </div>
 @endsection
