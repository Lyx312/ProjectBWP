@extends("layout.Home")

@section("content")
    <div class="card-columns">
        @foreach ($order as $orders)
            <p>Order ID: {{$orders->order_id}}</p>
            <p>Buyer: {{$orders->User->display_name}}</p>
            <p>Total Price: {{ number_format($orders->order_total, 0, ",", ".") }}</p>
        @endforeach
    </div>
@endsection
