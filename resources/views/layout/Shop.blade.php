@extends("layout.Home")

@section("content")
<style>


    .product-container {
        height: calc(100vh - 100px);
        overflow-y: auto;
        padding: 20px;
    }

    .product-card {
        border: none;
        width: 100%;
        transition: all 0.5s;
        border-radius: 10px; /* Rounded corners for the card */
        overflow: hidden; /* Ensure the image doesn't overflow */
    }

    .product-card img {
        width: 100%;
        height: 100%; /* Fill the entire height of the card */
        object-fit: cover; /* Maintain aspect ratio while covering the entire container */
        border-bottom: 1px solid #dee2e6;
    }

    .product-card h3 {
        font-size: 1rem; /* Decreased font size */
        margin: 0.5rem 0;
        color: #333;
    }

    .product-card p {
        font-size: 0.8rem; /* Decreased font size */
        color: #6c757d;
    }

    .product-card .btn-primary {
        background-color: #007bff;
        border: none;
        font-size: 0.8rem; /* Decreased font size */
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<section>
<div class="air air1"></div>
<div class="air air2"></div>
<div class="air air3"></div>
<div class="air air4"></div>

<div class="product-container">
    <div class="container-fluid py-5 content">
        <div class="container">
            @if ($categoryIsOn)
                <h1>Category: {{$category->category_name}}</h1>
            @endif
            <div class="row justify-content-center align-items-start">
                <div class="col">
                    <div class="row">
                        @foreach($sellerItems as $item)
                            <div class="col-md-2 mb-3">
                                <a href="/detail/{{ $item->item_id }}" value="{{ $item->item_id }}" style="text-decoration: none">
                                    <div class="card product-card">
                                        <img src="{{ $item->item_image }}" class="card-img-top" alt="Product Image">
                                        <div class="card-body">
                                            <h3 class="text-primary font-semibold mb-2">{{ $item->item_name }}</h3>
                                            <p class="text-primary mb-3">Price: ${{ $item->item_price }}</p>
                                            @if (Auth::check() && Auth::user()->role == 0)
                                                <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
