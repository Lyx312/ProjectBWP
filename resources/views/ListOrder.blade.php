@extends("layout.Home")
@section("content")
{{-- untuk melihat barang yg di order oleh customer --}}
<div class="container mt-5">
    <h2>List Order</h2>

    <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filter Status
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">All Orders</a></li>
            <li><a class="dropdown-item" href="#">Packed</a></li>
            <li><a class="dropdown-item" href="#">Delivered</a></li>
        </ul>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Furry Dolls</td>
                <td>2</td>
                <td>$100.00</td>
                <td></td>
                <td>
                    <button class="btn btn-danger btn-sm">Remove</button>
                    <button class="btn btn-warning btn-sm">Change</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="container">
        <div class="row">
            <div class="col ">
                </div>
                <div class="col bg-success rounded-pill">
                <p class="mt-3 text-center" style="font-weight: bold;">Total Price: $200.00</p>

            </div>
        </div>
    </div>
</div>

@endsection
