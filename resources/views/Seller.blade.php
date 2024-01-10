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
                        <h2>Kategori</h2>
                        <ul class="list-group" id="scrollspy">
                            <li class="list-group-item" ><a href="#simple-list-item-1">Daftar Pesanan </a></li>
                            <li class="list-group-item"><a href="#simple-list-item-2">Data Penjualan</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-3">Daftar Produk</a></li>
                            <li class="list-group-item"><a href="#simple-list-item-4">Tambah Product</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <!-- Daftar Pesanan  -->
                    <div id="daftar-pesanan">
                        <div class="card" style="width: auto;">
                            <div class="card-header" id="simple-list-item-1">
                                <h2>Daftar Pesanan</h2>
                            </div>
                            @foreach(range(1, 10) as $orderNumber)
                            <ul class="list-group list-group-flush rounded">
                                <button type="button" class="list-group-item list-group-item-action rounded" value="'{{$orderNumber}}'">
                                    ID Pesanan: {{ $orderNumber}}
                                    <br> Nama Pemesan: {{$orderNumber}}
                                </button>
                            </ul>
                            @endforeach
                        </div>
                    </div>

                    <!-- Data Penjualan -->
                    <div id="data-penjualan" class="container py-5" style="width:auto">
                        <strong><h2 id="simple-list-item-2">Data Penjualan</h2></strong>

                        <h4>Terjual paling Banyak</h4>
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
                                    <h2 class="card-header" id="simple-list-item-4">Add New Item</h2>
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

                                <!-- Daftar Produk -->
                                <h2 id="simple-list-item-3" class="card-header mt-3">Daftar Produk</h2>
                                <div class="row">
                                    @foreach($items as $item)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <a href="#" class="card-link">
                                                @if ($item["item_image"]!=null)

                                                    {{-- <img src="{{asset('storage/ItemImages/ImageItem2.webp')}}" class="card-img-top" alt="itemImage"> --}}
                                                    <img src="{{ asset("storage/{$item['item_image']}") }}" class="card-img-top" alt="itemImage">
                                                @else
                                                    <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="itemImage">
                                                @endif

                                                <div class="card-body text-dark">
                                                    <h5 class="card-title">{{ $item["item_name"] }}</h5>
                                                    <p class="card-text">Harga: Rp{{ $item["item_price"] }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tambah Product --}}
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
