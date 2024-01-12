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



<div class="container mt-5" style="margin-bottom: 75px;">
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
            <div class="card position-fixed mt-4" style="top: 50; right: 50; z-index: 1000; width: 400px;">
                <div class="card-body">
                    <h5 class="card-title" style="<?php echo ($cartSubtotal > Auth::user()->balance) ? 'color: red;' : 'color: black;'; ?>">
                        Balance: Rp{{ number_format(Auth::user()->balance, 0, ",", ".") }}
                    </h5>
                    <h5 class="card-title">Total</h5>
                    <p class="card-text font-weight-bold">Items In Cart: {{$cartTotalItems}}</p>
                    <p class="card-text font-weight-bold">Price: Rp{{ number_format($cartSubtotal, 0, ",", ".") }}</p>
                    <a href="{{ route('doCheckout') }}" class="btn btn-primary btn-block" style="margin-bottom: 10px;">Checkout</a>
                    @if(session('error'))
                        <div class="alert alert-danger"">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('thank_you'))
                        <div class="alert alert-info">
                            {{ session('thank_you') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


