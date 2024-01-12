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
                                <div class="rounded border border-tertiary d-flex justify-content-center" style="width: 100%">
                                    <button type="button" class="bg-light border-0 w-25" id="down" cartId="{{$cartItem->cart_id}}" onclick="updateSpinner(this, {{ isset($cartItem->cart_discount_id) ? $cartItem->cart_item_price * ((100 - $cartItem->Discount->discount_amount)/100) : $cartItem->cart_item_price }}, {{$cartItem->Item->item_stock}});" style="outline: none">-</button>
                                    <input class="form-text text-center align-middle" name="cart_item_quantity" id="itemQty{{$cartItem->cart_id}}" value="{{ $cartItem->cart_item_quantity }}" type="text" style="width:50px; display: inline; border: none; outline: none; text-align" readonly>
                                    <button type="button" class="bg-light border-0 w-25" id="up" cartId="{{$cartItem->cart_id}}" onclick="updateSpinner(this, {{ isset($cartItem->cart_discount_id) ? $cartItem->cart_item_price * ((100 - $cartItem->Discount->discount_amount)/100) : $cartItem->cart_item_price }}, {{$cartItem->Item->item_stock}});" style="outline: none">+</button>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                            <form method="POST" action="{{route("cart-master", $cartItem["cart_id"])}}">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{$cartItem["cart_id"]}}">
                                <input type="hidden" name="cart_item_quantity" id="cartQuantity{{$cartItem->cart_id}}" value="{{$cartItem["cart_item_quantity"]}}">
                                <button type="submit" class="btn btn-warning" name="editCart" style="width: 50%">Edit</button><br>
                                <button type="submit" class="btn btn-danger" name="removeCart" style="width: 50%">Remove</button>
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
                    <p class="card-text font-weight-bold" id="cartTotalItemText">Items In Cart: {{$cartTotalItems}}</p>
                    <p class="card-text font-weight-bold" id="cartSubtotalText">Price: Rp{{ number_format($cartSubtotal, 0, ",", ".") }}</p>
                    <a href="{{ route('doCheckout') }}" class="btn btn-primary btn-block" style="margin-bottom: 10px;">Checkout</a>
                    @if(session('error'))
                        <div class="alert alert-danger">
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


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function updateSpinner(obj, itemPrice, itemStock)
    {
        var cartId = obj.getAttribute('cartId');
        var value = parseInt($("#itemQty"+cartId).val());

        if(isNaN(value) || value<0 || value>itemStock){
            $(itemQty).val(0);
            return;
        } else {
            if(obj.id == "down" && value >= 1) {
                value--;
            } else if(obj.id == "up" && value < itemStock){
                value++;
            }
        }
        $("#itemQty"+cartId).val(value);
        $("#cartQuantity"+cartId).val(value);

    }
</script>
