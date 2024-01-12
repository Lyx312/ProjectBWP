@extends('layout.Home')

@section('content')

<style>
    .media-scroller {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: 10%;
        overflow-x: auto;
        overscroll-behavior-inline: contain;
        gap: 10px;
    }

    .custom-carousel-control {
        color: black !important;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(100%);
    }

    .card-body {
        padding: 15px;
    }

</style>

<div class="container-fluid" style="margin-bottom: 75px;">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome to Our E-Commerce Store</h2>
        <div id="carouselExampleControls" class="carousel slide" data-ride="false">
            <div class="carousel-inner">
                @foreach ($topRatedItems as $index => $item)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <a href="{{ route('detail-page', ['itemID' => $item->item_id]) }}">
                            <img src="{{ asset("storage/{$item->item_image}") }}" class="d-block mx-auto" style="max-width: 100%; height: 600px;" alt="{{ "Slide $index" }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev custom-carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next custom-carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-4 border rounded shadow">
        <h2 class="text-start mb-4 mt-2">Trending Products</h2>
        <div class="container mb-3 d-flex flex-row">
            @foreach ($trendingItems as $item)
                <div class="col-md-4 mb-3">
                    <div class="card product-card">
                        <a href="{{ route('detail-page', ['itemID' => $item->item_id]) }}">
                            <img src="{{ asset("storage/$item->item_image") }}" class="card-img-top" alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h3 class="text-primary font-semibold mb-2">{{ $item->item_name }}</h3>
                            @if ($item->discount)
                                <p class="text-danger mb-1" style="text-decoration: line-through;">Rp{{ number_format($item->item_price, 0, ",", ".") }}</p>
                                <p class="text-primary mb-3">Price: Rp. {{ number_format($item->item_price - ($item->Discount->discount_amount * $item->item_price / 100), 0, ",", ".") }}</p>
                            @else
                                <p class="text-primary mb-3">Price: Rp. {{ number_format($item->item_price, 0, ",", ".") }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-4 border rounded shadow">
        <h2 class="text-start mb-4 mt-2">Discount Product</h2>
        <div class="container media-scroller mb-3 d-flex flex-row">
            @foreach($discountedItems as $disc)
                <div class="col-md-4 mb-3">
                    <div class="card product-card">
                        <a href="{{ route('detail-page', ['itemID' => $disc->item_id]) }}">
                            <img src="{{ asset("storage/$disc->item_image") }}" class="card-img-top" alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h3 class="text-primary font-semibold mb-2">{{ $disc->item_name }}</h3>
                            <p class="text-danger mb-1" style="text-decoration: line-through;">Rp{{ number_format($disc->item_price, 0, ",", ".") }}</p>
                            <p class="text-primary mb-3">Price: Rp. {{ number_format($disc->item_price - ($disc->Discount->discount_amount * $disc->item_price / 100), 0, ",", ".") }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
