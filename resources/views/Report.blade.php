@extends("layout.Home")

@section("content")
    
    <div class="card-columns mx-3 mb-3">
        @foreach ($order as $orders)
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title">Order ID: {{$orders->order_id}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Buyer: {{$orders->User->display_name}}</p>
                <p class="card-text">Total Price: {{ number_format($orders->order_total, 0, ",", ".") }}</p>
                <p class="card-text">Items:</p>

                    @foreach ($orders->OrderDetail as $index => $detail)
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
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td class="">{{$detail->detail_item_id}}</td>
                                    <td> {{$detail->detail_item_quantity}}</td>
                                    <td>  {{ number_format($detail->detail_subtotal, 0, ",", ".") }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach

            </div>
        </div>
        @endforeach
    </div>
@endsection
