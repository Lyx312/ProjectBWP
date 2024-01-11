@extends('layout.Home')

@section('content')
    @foreach ($cart as $cartItem)
        <h4>{{$cartItem->Item->item_name}}</h4>
        <h6>Item Price: {{$cartItem->cart_item_price}}</h6>
        @if ($cartItem->cart_discount_id != null)
        {{-- <h6>Discounted Price: {{$cartItem->Discount->discount_amount}}</h6> --}}
        @endif
        <h6>Quantity: {{$cartItem->cart_item_quantity}}</h6>
        <h6>Subtotal: {{$cartItem->cart_subtotal}}</h6>
    @endforeach



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
                                <p class="text-muted">${{ $cartItem->cart_item_price }}</p>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" value="{{ $cartItem->cart_item_quantity }}" min="1">
                            </div>
                            <div class="col-md-4 text-right">
                                <button class="btn btn-danger">Remove</button>
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
                    <p class="card-text font-weight-bold">Total: $</p>
                    <a href="#" class="btn btn-primary btn-block">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


