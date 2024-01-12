@extends('layout.Home')

@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-md-8">
        @forelse ($cart as $cartItem)
            @if ($cartItem->cart_owner === Auth::user()->username)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset("storage/" . $cartItem->Item->item_image) }}" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <p class="font-weight-bold">{{ $cartItem->Item->item_name }}</p>
                                <p class="text-muted">Price: Rp{{ number_format($cartItem->cart_item_price, 0, ",", ".") }}</p>
                                @foreach ($discounts as $discount)
                                    @if ($discount->discount_item_id == $cartItem->cart_item_id)
                                        <p class="text-muted">Discounted Price: Rp{{number_format($cartItem->cart_item_price*((100-$discount->discount_amount)/100), 0, ",", ".")}}</p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" value="{{ $cartItem->cart_item_quantity }}" min="1">
                            </div>
                            <div class="col-md-4 text-right">
                            <form method="POST" action="{{route("cart-remove", $cartItem["cart_id"])}}">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{$cartItem["cart_id"]}}">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <p>No items in the cart.</p>
        @endforelse
        </div>


        <div class="col-md-4">
            <div class="card sticky-top mt-4">
                <div class="card-body">
                    <h5 class="card-title">Total</h5>
                    <p class="card-text font-weight-bold">Total: Rp{{$cart->sum('cart_subtotal')}}</p>
                    <a href="#" class="btn btn-primary btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


