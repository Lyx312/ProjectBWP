@extends("layout.Home")
@section("content")
{{-- untuk melihat barang yg di order oleh customer --}}
<div class="container mt-5">
    <h2>List Order</h2>

    @foreach ($orders as $order)
        <h5>Order ID: {{$order->order_id}}</h5>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->OrderDetail as $index => $detail)
                <tr>
                    <td scope="col">{{$index+1}}</td>
                    <td scope="col">{{$detail->Item->item_name}}</td>
                    <td scope="col">Rp{{$detail->Item->item_price}}</td>
                    <td scope="col">{{$detail->detail_discount_id!=null ? "Rp" . $detail->Item->item_price * ((100-$detail->Discount->discount_amount)/100) : "-"}}</td>
                    <td scope="col">{{$detail->detail_item_quantity}}</td>
                    <td scope="col">Rp{{$detail->detail_subtotal}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col ">
                    </div>
                    <div class="col bg-success rounded-pill">
                    <p class="mt-3 text-center" style="font-weight: bold;">Total Price: Rp{{$order->order_total}}</p>
                </div>
            </div>
        </div>
    @endforeach


</div>

@endsection
