@extends("layout.Home")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan dan Produk</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .list-group-item {
            transition: 100ms;
        }

        .list-group-item:hover {
            transform: scale(1.005);
        }
    </style>
</head>

@section("content")
<body data-spy="scroll" data-target="#scrollspy" data-offset="50">

    <div class="container-fluid py-5 content">

        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div id="kategori" class="sticky-top">
                        <h2>Categories</h2>
                        <ul class="list-group" id="scrollspy">
                            <li class="list-group-item" ><a href="#simple-list-item-1">List Of Orders</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-2">Order Data</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-3">Add New Item</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-4">Items Being Sold</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <!-- Daftar Pesanan  -->
                    <div id="daftar-pesanan">
                        <div class="card" style="width: auto;">
                            <div class="card-header" id="simple-list-item-1">
                                <h2>List Of Orders</h2>
                            </div>
                            @foreach($items as $item)
                            @if ($item->OrderDetail != null)
                            <ul class="list-group list-group-flush rounded">
                                <button type="button" class="list-group-item list-group-item-action rounded" value="'{{$item->item_id}}'">
                                    <img src="{{"storage/$item->item_image"}}" width="200px" alt="Item_Image_{{$item->item_id}}"><br>
                                    Order Detail ID: {{$item->OrderDetail->detail_id}}<br>
                                    Item Name: {{$item->item_name}}<br>
                                    Item Price: Rp{{number_format($item->OrderDetail->detail_item_price, 0, ",", ".")}}<br>
                                    Item Quantity: {{$item->OrderDetail->detail_item_quantity}}<br>
                                    Item Subtotal: Rp{{number_format($item->OrderDetail->detail_subtotal, 0, ",", ".")}}<br>
                                    Category: {{$item->Category->category_name}}<br>
                                    Buyer: {{$item->OrderDetail->Order->User->display_name}}
                                </button>
                            </ul>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Data Penjualan -->
                    <div id="data-penjualan" class="container py-5" style="width:auto">
                        <strong><h2 id="simple-list-item-2">Order Data</h2></strong>

                        <h4>Best Seller </h4>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="https://via.placeholder.com/600x400">
                                    <div class="card-body">
                                        <h5 class="card-title">Barang : 1</h5>
                                        <p class="card-text">Harga: $1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produk -->
                    <div id="daftar-produk" class="container py-5 border">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Filter -->
                                <form action="#" method="post">
                                    <h5>Filter</h5>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="filter_low" name="filter_low" value="1">
                                        <label class="form-check-label" for="filter_low">Harga Rendah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="filter_medium" name="filter_medium" value="1">
                                        <label class="form-check-label" for="filter_medium">Harga Sedang</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="filter_high" name="filter_high" value="1">
                                        <label class="form-check-label" for="filter_high">Harga Tinggi</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Filter</button>
                                </form>
                            </div>
                            <div id="daftar-produk-content" class="col-md-9">
                                <form method="POST" action="{{route('add-item-process')}}" enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="card-header" id="simple-list-item-3">Add New Item</h2>
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
                                    <button type="submit" class="btn btn-primary">Add New Item</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Daftar Produk -->
                        <div id="daftar-pesanan" style="padding-top: 50px">
                            <div class="card" style="width: auto;">
                                <div class="card-header" id="simple-list-item-4">
                                    <h2>Items Being Sold</h2>
                                </div>
                                @foreach($items as $item)
                                <ul class="list-group list-group-flush rounded">
                                    <button type="button" class="list-group-item list-group-item-action rounded" value="'{{$item->item_id}}'">
                                        <img src="{{"storage/$item->item_image"}}" width="200px" alt="Item_Image_{{$item->item_id}}"><br>
                                        Item ID: {{ $item->item_id}}<br>
                                        Item Name: {{$item->item_name}}<br>
                                        Item Description: {{$item->item_description}}<br>
                                        Item Price: Rp{{number_format($item["item_price"], 0, ",", ".")}}<br>
                                        Item Stock: {{$item->item_stock}}<br>
                                        Category: {{$item->Category->category_name}}<br>
                                        <a href="/detail/{{ $item->item_id }}" style="text-decoration: none" class="btn btn-info btn-block mt-2">View Details</a>
                                    </button>
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

</html>
