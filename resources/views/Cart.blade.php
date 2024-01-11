@extends('layout.Home')

@section('content')
    {{-- @foreach ($cart as $cartItem)
        <h4>{{$cartItem->Item->item_name}}</h4>
        <h6>Item Price: {{$cartItem->cart_item_price}}</h6>
        @if ($cartItem->cart_discount_id != null)
        <h6>Discounted Price: {{$cartItem->Discount->discount_amount}}</h6>
        @endif
        <h6>Quantity: {{$cartItem->cart_item_quantity}}</h6>
        <h6>Subtotal: {{$cartItem->cart_subtotal}}</h6>
    @endforeach --}}



<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
        @forelse ($cart as $cartItem)
            @if ($cartItem->cart_owner === Auth::user()->username)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset($cartItem->Item->item_image) }}" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <p class="font-weight-bold">{{ $cartItem->Item->item_name }}</p>
                                    @if(isset($cartItem->Discount))
                                        <p class="text-danger mb-1" style="text-decoration: line-through;">Rp{{ number_format($cartItem->cart_item_price, 0, ",", ".") }}</p>
                                        <p class="text-muted">Rp{{ number_format($cartItem->cart_item_price - ($cartItem->Discount->discount_amount * $cartItem->cart_item_price / 100), 0, ",", ".") }}</p>
                                    @else
                                        <p class="text-muted">Rp{{ number_format($cartItem->cart_item_price, 0, ",", ".") }}</p>
                                    @endif
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" value="{{ $cartItem->cart_item_quantity }}" min="1" data-cart-id="{{ $cartItem->cart_id }}">
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
                    <p class="card-text font-weight-bold">Total: Rp{{ number_format($cartSubtotal, 0, ",", ".") }}</p>
                    <a href="{{route('doCheckout')}}" class="btn btn-primary btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


