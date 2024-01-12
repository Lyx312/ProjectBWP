@php
    $pattern = '%%';
    if (isset($_GET['keyword'])) {
        $pattern = '%' . $_GET['keyword'] . '%';
    }

    $sellerItems = Item::with('User')
                    ->whereHas('User', function ($query) {
                        $query->where('is_banned', 0);
                    })
                    ->where("item_name", "like", $pattern);
                    ->get();
@endphp

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

