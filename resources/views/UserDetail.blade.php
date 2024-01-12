@extends('layout.Home')
@section('content')
<div class="list-group list-group-flush px-3">
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Profile Picture:</strong></div>
            <div class="col-10">
                <div style="width: 30px; height: 30px; overflow: hidden; border-radius: 50%; margin-left: 10px;">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile_picture" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Username:</strong></div>
            <div class="col-10">{{ $user->username }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Display Name:</strong></div>
            <div class="col-10">{{ $user->display_name }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Email:</strong></div>
            <div class="col-10">{{ $user->email }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Phone Number:</strong></div>
            <div class="col-10">{{ $user->phone_number }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Address:</strong></div>
            <div class="col-10">{{ $user->address }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Balance:</strong></div>
            <div class="col-10">Rp{{ number_format($user->balance, 0, ",", ".") }}</div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="row align-items-center">
            <div class="col-2"><strong>Role:</strong></div>
            <div class="col-10">
                @if($user->role == 0)
                    Customer
                @elseif($user->role == 1)
                    Seller
                @endif
            </div>
        </div>
    </li>
</div>

@if ($user->role == 1)
<div>
    <strong><h2>Items Being Sold:</h2></strong>
</div>
    @if (count($user->Item) == 0)
                                <h5 class="text-center m-3">No items being sold</h5>
                            @endif
                            @foreach($user->Item as $item)
                            <ul class="list-group list-group-flush rounded">
                                <li class="list-group-item list-group-item-action rounded text-left">
                                    <div class="d-flex">
                                        <img src="{{asset("storage/$item->item_image")}}" height="200px" width="200px" alt="Item_Image_{{$item->item_id}}" class="float-left">
                                        <div style="padding-left: 20px;">
                                            Item ID: {{ $item->item_id}}<br>
                                            Item Name: {{$item->item_name}}<br>
                                            Item Description: {{$item->item_description}}<br>
                                            Item Price: Rp{{number_format($item["item_price"], 0, ",", ".")}}<br>
                                            @if ($item->Discount && now()->isBetween($item->Discount->discount_start_date, $item->Discount->discount_end_date))
                                                Discount Price: Rp{{number_format($item->item_price*((100-$item->Discount->discount_amount)/100), 0, ",", ".")}}<br>
                                            @endif
                                            Item Stock: {{$item->item_stock}}<br>
                                            Category: {{$item->Category->category_name}}<br>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-group mt-2" role="group" aria-label="Item Actions">
                                        <a href="/detail/{{ $item->item_id }}" class="btn btn-info">View Details</a>
                                    </div>
                                </li>
                            </ul>
                            @endforeach

@endif
@endsection
