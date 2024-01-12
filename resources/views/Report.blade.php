@extends("layout.Home")

@section("content")
<<<<<<< HEAD
<h2 class="text-center mb-4">Order Report</h2>
    <div class="card-columns mx-3 mb-3">
=======
    <div class="card-rows mx-3 mb-3">
>>>>>>> 6a20fbb6f42d7a2c0a97ec9872f8e90b07884f79
        @foreach ($order as $orders)
            <div class="card mt-5">
                <div class="card-header bg-primary">
                    <h5 class="card-title">Order ID: {{$orders->order_id}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Buyer: {{$orders->User->display_name}}</p>
                    <p class="card-text">Total Price: {{ number_format($orders->order_total, 0, ",", ".") }}</p>
                    <p class="card-text">Items:</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->OrderDetail as $index => $detail)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td class="">{{$detail->Item->item_name}}</td>
                                    <td>{{$detail->detail_item_quantity}}</td>
                                    <td>{{ number_format($detail->detail_subtotal, 0, ",", ".") }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
<h2 class="text-center mb-4">Customer Report</h2>
<div class="card-columns mx-3 mb-3">
    @foreach ($customers as $customer)
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="card-title">Customer: {{ $customer->display_name }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Total Spending: ${{ number_format($customer->Order->sum('order_total'), 0, ",", ".") }}</p>
                <p class="card-text">Items Bought:</p>
                @if ($customer->OrderDetail)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->OrderDetail as $index => $orderDetail)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $orderDetail->Item->item_name }}</td>
                                    <td>{{ $orderDetail->detail_item_quantity }}</td>
                                    <td>${{ number_format($orderDetail->detail_subtotal, 0, ",", ".") }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="card-text">No items bought.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection