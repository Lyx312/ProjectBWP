@extends("layout.Home")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products & Orders</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .list-group-item {
            transition: 100ms;
        }

        .list-group-item:hover {
            transform: scale(1.005);
        }
        #kategori.sticky-top {
            position: -webkit-sticky;
            position: sticky;
            top: 75px;
        }
    </style>
</head>

@section("content")
<body data-spy="scroll" data-target="#scrollspy" data-offset="50">

    <div class="container-fluid py-5 content">

        <div class="container">
            <div class="row row-cols-1">

                <div class="col-md-3">
                    <div id="kategori" class="sticky-top">
                        <h2>Categories</h2>
                        <ul class="list-group" id="scrollspy">
                            <li class="list-group-item"><a href="#simple-list-item-1">List Of Orders</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-2">Best Seller</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-3">Add New Item</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-4">Items Being Sold</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-5">Deleted Items</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-6">Add Discounts</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-7">Ongoing Discounts</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-8">Upcoming Discounts</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-9">Past Discounts</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9" id="simple-list-item-1">
                    <!-- Daftar Pesanan  -->
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <p class="m-0">{{Session::get('success')}}</p>
                        </div>
                    @endif
                        <div class="card" style="width: auto;">
                            <div class="card-header">
                                <h2>List Of Orders</h2>
                            </div>
                            @foreach($items as $item)
                            @if ($item->OrderDetail != null)
                            <a href="/detail/{{ $item->item_id }}" style="text-decoration: none">
                                <ul class="list-group list-group-flush rounded">
                                    <button type="button" class="list-group-item list-group-item-action rounded text-left"" value="'{{$item->item_id}}'">
                                        <img src="{{"storage/$item->item_image"}}" height="200px" width="200px" alt="Item_Image_{{$item->item_id}}" class="float-left">
                                        <div  style="padding-left: 250px;">
                                            Order Detail ID: {{$item->OrderDetail->detail_id}}<br>
                                            Item Name: {{$item->item_name}}<br>
                                            Item Price: Rp{{number_format($item->OrderDetail->detail_item_price, 0, ",", ".")}}<br>
                                            Item Quantity: {{$item->OrderDetail->detail_item_quantity}}<br>
                                            Item Subtotal: Rp{{number_format($item->OrderDetail->detail_subtotal, 0, ",", ".")}}<br>
                                            Category: {{$item->Category->category_name}}<br>
                                            Buyer: {{$item->OrderDetail->Order->User->display_name}}
                                        </div>
                                    </button>
                                </ul>
                            </a>
                            @endif
                            @endforeach
                        </div>


                    <!-- Data Penjualan -->
                    <div  id="simple-list-item-2" class="container py-5">
                        <div class="card" style="width: auto; margin: 0px;">
                        <div class="card-header">
                            <h2>Best Seller</h2>
                        </div>
                        <ul class="list-group list-group-flush rounded">

                            @if ($bestSeller)
                                <a href="/detail/{{ $bestSeller->Item->item_id }}" style="text-decoration: none">
                                    <button type="button" class="list-group-item list-group-item-action rounded text-left" value="'{{$bestSeller->Item->item_id}}'">
                                        <!-- Display the bestseller item information -->
                                        <img src="{{ asset("storage/{$bestSeller->Item->item_image}") }}" height="200px" width="200px" alt="Item_Image_{{ $bestSeller->Item->item_id }}" class="float-left">
                                        <div style="padding-left: 250px;">
                                            Order Detail ID: {{ $bestSeller->detail_id }}<br>
                                            Item Name: {{ $bestSeller->Item->item_name }}<br>
                                            Item Price: Rp{{ number_format($bestSeller->detail_item_price, 0, ",", ".") }}<br>
                                            Item Quantity: {{ $bestSeller->detail_item_quantity }}<br>
                                            Item Subtotal: Rp{{ number_format($bestSeller->detail_subtotal, 0, ",", ".") }}<br>
                                            Category: {{ $bestSeller->Item->Category->category_name }}<br>
                                        </div>
                                    </button>
                                </a>
                                @else
                                <strong><h5>No Item Has Been Reviewed</h5></strong>
                            @endif
                        </ul>
                    </div>
                    </div>

                    <!-- Produk -->
                    <div  id="simple-list-item-3" class="container py-5 border">
                        <div class="row">
                            <div id="daftar-produk-content" class="col-md-12">
                                <form method="POST" action="{{route('master-item-process')}}" id="masterItemForm" enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="card-header">Master Item</h2>
                                    <div class="mb-3">
                                        <label for="item_id" class="form-label">Item ID</label>
                                        <input type="text" class="form-control" id="item_id" name="item_id" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_name" class="form-label">Item Name</label>
                                        @if($errors->has('item_name'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_name') }}
                                            </div>
                                        @endif
                                        <input type="text" class="form-control" id="item_name" name="item_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_description" class="form-label">Item Description</label>
                                        @if($errors->has('item_description'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_description') }}
                                            </div>
                                        @endif
                                        <textarea class="form-control" id="item_description" name="item_description" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_image" class="form-label">Item Image</label>
                                        @if($errors->has('item_image'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_image') }}
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" id="item_image" name="item_image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_price" class="form-label">Item Price</label>
                                        @if($errors->has('item_price'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_price') }}
                                            </div>
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="item_price" name="item_price" min="1000" step="1000" value="1000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_stock" class="form-label">Item Stock</label>
                                        @if($errors->has('item_stock'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_stock') }}
                                            </div>
                                        @endif
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="item_stock" name="item_stock" min="1" value="1">
                                            <span class="input-group-text">item(s)</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="item_category" class="form-label">Item Category</label>
                                        @if($errors->has('item_category'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('item_category') }}
                                            </div>
                                        @endif
                                        <select class="form-control" name="item_category" id="item_category">
                                            @foreach ($categories as $category)
                                                <option class="form-control" value="{{$category["category_id"]}}">{{$category["category_name"]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="item_add">Add New Item</button>
                                    <button type="submit" class="btn btn-warning" name="item_update">Update Item</button>
                                    <button type="reset" class="btn btn-danger">Reset Input</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Daftar Produk -->
                    <div id="simple-list-item-4" class="mb-5" style="padding-top: 50px">
                        <div class="card" style="width: auto;">
                            <div class="card-header">
                                <h2>Items Being Sold</h2>
                            </div>
                            @if (count($items) == 0)
                                <h5 class="text-center m-3">No items being sold</h5>
                            @endif
                            @foreach($items as $item)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <div class="d-flex">
                                        <img src="{{"storage/$item->item_image"}}" height="200px" width="200px" alt="Item_Image_{{$item->item_id}}" class="float-left">
                                        <div style="padding-left: 20px;">
                                            Item ID: {{ $item->item_id}}<br>
                                            Item Name: {{$item->item_name}}<br>
                                            Item Description: {{$item->item_description}}<br>
                                            Item Price: Rp{{number_format($item["item_price"], 0, ",", ".")}}<br>
                                            @if ($item->Discount && now()->isBetween($item->Discount->discount_start_date, $item->Discount->discount_end_date))
                                                Discount Price: Rp{{number_format($item->item_price*((100-$item->Discount->discount_amount)/100), 0, ",", ".")}}<br>
                                            @endif
                                            Item Stock: {{$item->item_stock}}<br>
                                            Category: {{$item->Category->category_name}}<br>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-group mt-2" role="group" aria-label="Item Actions">
                                        <a href="/detail/{{ $item->item_id }}" class="btn btn-info">View Details</a>
                                        <button class="btn btn-warning" id="btnUpdate" item="{{json_encode($item)}}">Update Item</button>
                                        <a href="/delete/{{ $item->item_id }}" id="btnDelete" class="btn btn-danger">Delete Item</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                        <div class="card mt-3" style="width: auto;" id="simple-list-item-5">
                            <div class="card-header">
                                <h2>Deleted Items</h2>
                            </div>
                            @if (count($deletedItems) == 0)
                                <h5 class="text-center m-3">No deleted items</h5>
                            @endif
                            @foreach($deletedItems as $item)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <img src="{{"storage/$item->item_image"}}" height="200px" width="200px" alt="Item_Image_{{$item->item_id}}" class="float-left">
                                    <div style="padding-left: 250px">
                                        Item ID: {{ $item->item_id}}<br>
                                        Item Name: {{$item->item_name}}<br>
                                        Item Description: {{$item->item_description}}<br>
                                        Item Price: Rp{{number_format($item["item_price"], 0, ",", ".")}}<br>
                                        Item Stock: {{$item->item_stock}}<br>
                                        Category: {{$item->Category->category_name}}<br>
                                        <a href="/restore/{{ $item->item_id }}" id="btnRestore" class="btn btn-warning w-100 mt-2">Restore Item</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                    </div>
                    <div  id="simple-list-item-6" class="container py-5 border">
                        <div id="form_discount">
                            <form method="POST" action="{{route('master-discount-process')}}" id="discountForm">
                                @csrf
                                <h2 class="card-header" id="simple-list-item-3">Master Discount</h2>
                                <div class="mb-3">
                                    <label for="discount_id" class="form-label">Discount ID</label>
                                    <input type="text" class="form-control" id="discount_id" name="discount_id" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="discount_name" class="form-label">Discount Name</label>
                                    @if($errors->has('discount_name'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount_name') }}
                                        </div>
                                    @endif
                                    <input type="text" class="form-control" id="discount_name" name="discount_name">
                                </div>
                                <div class="mb-3">
                                    <label for="discount_item_id" class="form-label">Item</label>
                                    @if($errors->has('discount_item_id'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount_item_id') }}
                                        </div>
                                    @endif
                                    <select class="form-control" name="discount_item_id" id="discount_item_id">
                                        @foreach ($items as $item)
                                            <option class="form-control" value="{{$item->item_id}}">{{$item->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="discount_amount" class="form-label">Discount Amount</label>
                                    @if($errors->has('discount_amount'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount_amount') }}
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="discount_amount" name="discount_amount" min="1" value="1">
                                        <span class="input-group-text">% Off</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="discount_start_date" class="form-label">Start Date</label>
                                    @if($errors->has('discount_start_date'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount_start_date') }}
                                        </div>
                                    @endif
                                    <input type="datetime-local" class="form-control" id="discount_start_date" name="discount_start_date">
                                </div>
                                <div class="mb-3">
                                    <label for="discount_end_date" class="form-label">End Date</label>
                                    @if($errors->has('discount_end_date'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount_end_date') }}
                                        </div>
                                    @endif
                                    <input type="datetime-local" class="form-control" id="discount_end_date" name="discount_end_date">
                                </div>

                                <button type="submit" class="btn btn-primary" name="discount_add">Add New Discount</button>
                                <button type="submit" class="btn btn-warning" name="discount_update">Update Discount</button>
                                <button type="reset" class="btn btn-danger">Reset Input</button>
                            </form>
                        </div>
                    </div>


                    <!-- Discount list -->
                    <div  id="simple-list-item-7" class="mb-5" style="padding-top: 50px">
                        <div class="card" style="width: auto;">
                            <div class="card-header" id="simple-list-item-4">
                                <h2>Active Discounts</h2>
                            </div>
                            @if (count($activeDiscounts) == 0)
                                <h5 class="text-center m-3">No active discounts</h5>
                            @endif
                            @foreach($activeDiscounts as $discount)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <div class="d-flex">
                                        <img src="{{"storage/" . $discount->Item->item_image}}" height="200px" width="200px" alt="Item_Image_{{$discount->discount_item_id}}" class="float-left">
                                        <div style="padding-left: 20px;">
                                            Discount ID: {{ $discount->discount_id}}<br>
                                            Discount Name: {{ $discount->discount_name}}<br>
                                            Item: {{ $discount->Item->item_name}}<br>
                                            Discount Amount: {{ $discount->discount_amount}}% Off<br>
                                            Original Price: Rp{{ number_format($discount->Item->item_price, 0, ",", ".")}}<br>
                                            Discount Price: Rp{{number_format($discount->Item->item_price*((100-$discount->discount_amount)/100), 0, ",", ".")}}<br>
                                            Start Date: {{ $discount->discount_start_date}}<br>
                                            End Date: {{ $discount->discount_end_date}}<br>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-group mt-2" role="group" aria-label="Item Actions">
                                        <button class="btn btn-warning" id="btnUpdateDiscount" discount="{{json_encode($discount)}}">Update Discount</button>
                                        <a href="/deleteDiscount/{{ $discount->discount_id }}" id="btnDeleteDiscount" class="btn btn-danger">Delete Discount</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                        <div class="card mt-3" style="width: auto;" id="simple-list-item-8">
                            <div class="card-header">
                                <h2>Upcoming Discounts</h2>
                            </div>
                            @if (count($upcomingDiscounts) == 0)
                                <h5 class="text-center m-3">No upcoming discounts</h5>
                            @endif
                            @foreach($upcomingDiscounts as $discount)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <div class="d-flex">
                                        <img src="{{"storage/" . $discount->Item->item_image}}" height="200px" width="200px" alt="Item_Image_{{$discount->discount_item_id}}" class="float-left">
                                        <div style="padding-left: 20px;">
                                            Discount ID: {{ $discount->discount_id}}<br>
                                            Discount Name: {{ $discount->discount_name}}<br>
                                            Item: {{ $discount->Item->item_name}}<br>
                                            Discount Amount: {{ $discount->discount_amount}}% Off<br>
                                            Original Price: Rp{{ number_format($discount->Item->item_price, 0, ",", ".")}}<br>
                                            Discount Price: Rp{{number_format($discount->Item->item_price*((100-$discount->discount_amount)/100), 0, ",", ".")}}<br>
                                            Start Date: {{ $discount->discount_start_date}}<br>
                                            End Date: {{ $discount->discount_end_date}}<br>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-group mt-2" role="group" aria-label="Item Actions">
                                        <button class="btn btn-warning" id="btnUpdateDiscount" discount="{{json_encode($discount)}}">Update Discount</button>
                                        <a href="/deleteDiscount/{{ $discount->discount_id }}" id="btnDeleteDiscount" class="btn btn-danger">Delete Discount</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                        <div class="card mt-3" style="width: auto;" id="simple-list-item-9">
                            <div class="card-header">
                                <h2>Past Discounts</h2>
                            </div>
                            @if (count($pastDiscounts) == 0)
                                <h5 class="text-center m-3">No past discounts</h5>
                            @endif
                            @foreach($pastDiscounts as $discount)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <div class="d-flex">
                                        <img src="{{"storage/" . $discount->Item->item_image}}" height="200px" width="200px" alt="Item_Image_{{$discount->discount_item_id}}" class="float-left">
                                        <div style="padding-left: 20px;">
                                            Discount ID: {{ $discount->discount_id}}<br>
                                            Discount Name: {{ $discount->discount_name}}<br>
                                            Item: {{ $discount->Item->item_name}}<br>
                                            Discount Amount: {{ $discount->discount_amount}}% Off<br>
                                            Original Price: Rp{{ number_format($discount->Item->item_price, 0, ",", ".")}}<br>
                                            Discount Price: Rp{{number_format($discount->Item->item_price*((100-$discount->discount_amount)/100), 0, ",", ".")}}<br>
                                            Start Date: {{ $discount->discount_start_date}}<br>
                                            End Date: {{ $discount->discount_end_date}}<br>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-group mt-2" role="group" aria-label="Item Actions">
                                        <button class="btn btn-warning" id="btnUpdateDiscount" discount="{{json_encode($discount)}}">Update Discount</button>
                                        <a href="/deleteDiscount/{{ $discount->discount_id }}" id="btnDeleteDiscount" class="btn btn-danger">Delete Discount</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ide ajax, bisa tampil langsung setelah add item baru --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(btnUpdate).click(function () {
            var itemJSON = $(this).attr('item');
            var item = JSON.parse(itemJSON);

            $(item_id).val(item.item_id);
            $(item_name).val(item.item_name);
            $(item_description).val(item.item_description);

            $(item_price).val(item.item_price);
            $(item_stock).val(item.item_stock);
            $(item_category).val(item.item_category);

            document.getElementById('daftar-produk').scrollIntoView({ behavior: 'smooth' });
        });

        $(btnDelete).click(function (e) {
            var confirmDelete = confirm("Are you sure you want to delete this item?");
            if (!confirmDelete) {
                e.preventDefault();
            }
        });

        $(btnUpdateDiscount).click(function () {
            var discountJSON = $(this).attr('discount');
            var discount = JSON.parse(discountJSON);

            console.log(discount.discount_id);

            $(discount_id).val(discount.discount_id);
            $(discount_name).val(discount.discount_name);
            $(discount_item_id).val(discount.discount_item_id);
            $(discount_amount).val(discount.discount_amount);

            var startDate = new Date(discount.discount_start_date);
            startDate.setHours(startDate.getHours() + 7);
            var formattedStartDate = startDate.toISOString().slice(0, 16).replace("T", " ");
            $(discount_start_date).val(formattedStartDate);

            var endDate = new Date(discount.discount_end_date);
            endDate.setHours(endDate.getHours() + 7);
            var formattedEndDate = endDate.toISOString().slice(0, 16).replace("T", " ");
            $(discount_end_date).val(formattedEndDate);

            document.getElementById('discounts').scrollIntoView({ behavior: 'smooth' });
        });

        $(btnRestore).click(function (e) {
            var confirmRestore = confirm("Are you sure you want to restore this item?");
            if (!confirmRestore) {
                e.preventDefault();
            }
        });
    });
</script>

</html>
