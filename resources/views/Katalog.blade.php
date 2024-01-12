@extends('layout.Home')

@section('content')

<style>
    .media-scroller {
    display: grid;
    grid-auto-flow:column;
    grid-auto-columns:10%;
    overflow-x: auto;
    overscroll-behavior-inline: contain;
    gap:10px;

}
</style>

<div class="container-fluid" style="margin-bottom: 75px;">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome to Our E-Commerce Store</h2>

        <div id="carouselExampleControls" class="carousel slide" data-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
        </div>
        {{-- icon icon di bawah carousel  --}}
        <div class="row justify-content-center align-items-center mt-3" >
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>

        </div>
        {{-- end icon dibawah carousel --}}
    </div>

    <!-- Trending Products -->
    <div class="container mt-4 border rounded shadow">
        <h2 class="text-start mb-4">Trending Products</h2>
        <div class="container media-scroller mb-3 d-flex flex-row">
            @foreach ($trendingItems as $item)
                <div class="col-md-4 mb-3">
                    <div class="card product-card">
                        <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h3 class="text-primary font-semibold mb-2">{{ $item->item_name }}</h3>
                            <p class="text-primary mb-3">Price: ${{ $item->item_price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4 border rounded shadow">
        <h2 class="text-start mb-4">Discount Product</h2>
        <div class="container media-scroller mb-3 d-flex flex-row">
            @foreach($discountedItems as $disc)
                <div class="col-md-4 mb-3">
                    <div class="card product-card">
                        <img src="{{ asset("storage/$disc->item_image") }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <p class="text-danger mb-1" style="text-decoration: line-through;">Rp{{ number_format($disc->item_price, 0, ",", ".") }}</p>
                            <p class="text-primary mb-3">Price: Rp{{ number_format($disc->item_price - ($disc->Discount->discount_amount * $disc->item_price / 100), 0, ",", ".") }}</p>
                            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="{{$disc->Discount->discount_amount}}"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info" style="width: 15%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
