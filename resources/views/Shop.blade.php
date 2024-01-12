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
                <h1>Category: {{ $category->category_name }}</h1>
            @endif
            <div class="search d-flex align-items-center my-2">
                <p class="m-0" style="width: 8vw">Search Item:</p>
                <input type="text" class="form-control" name="search" id="search" onkeyup="refreshItems()">
            </div>
            <div class="row justify-content-center align-items-start" id="item_list" onload="refreshItems()">
                <div class="col">
                    <div class="row">
                        @foreach($sellerItems as $item)
                            <div class="col-md-2 mb-3">
                            <div class="card product-card">
                                <img src="{{ asset("storage/$item->item_image") }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h3 class="text-primary font-semibold mb-2">{{ $item->item_name }}</h3>
                                    @if(isset($item->Discount))
                                        <p class="text-danger mb-1" style="text-decoration: line-through;">Rp{{ number_format($item->item_price, 0, ",", ".") }}</p>
                                        <p class="text-primary mb-3">Price: Rp{{ number_format($item->item_price - ($item->Discount->discount_amount * $item->item_price / 100), 0, ",", ".") }}</p>
                                    @else
                                        <p class="text-primary mb-3">Price: Rp{{ number_format($item->item_price, 0, ",", ".") }}</p>
                                    @endif

                                    @if (Auth::check() && Auth::user()->role == 0)
                                        <form action="{{ route('add-to-cart', ['itemID' => $item->item_id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                                            <input type="hidden" name="item_quantity" value="1">
                                            <input type="hidden" name="subtotal" value="{{ $item->item_price }}">
                                            {{-- <button type="submit" class="btn btn-primary btn-block">Add to Cart</button> --}}
                                        </form>
                                    @endif

                                    <!-- Separate link to the detail page -->
                                    <a href="/detail/{{ $item->item_id }}" style="text-decoration: none" class="btn btn-info btn-block mt-2">View Details</a>
                                </div>
                            </div>

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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Use the ready function to ensure the document is fully loaded

        var itemList = $('#item_list');

        // $('#search').keyup(function() {
        //     refreshItems();
        //     console.log($("#search").val());
        // });

        function refreshItems() {
        //     // Use the full jQuery.ajax() instead of $.get
            $.ajax({
                url: '/search',
                method: 'GET',
                data: { keyword: $("#search").val() },
                success: function(data) {
                    itemList.html(data);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });

        }

</script>
