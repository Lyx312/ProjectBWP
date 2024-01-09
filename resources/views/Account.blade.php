@extends("layout.Home")

@section("content")
    <div class="container mt-5">
        <h1 class="mb-4">Welcome, {{ auth()->user()->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Account Information</h3>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Username:</strong> {{ auth()->user()->username }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->email }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ auth()->user()->phone_number }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ auth()->user()->address }}</li>
                    <li class="list-group-item"><strong>Balance:</strong> Rp.{{ auth()->user()->balance }}</li>
                    <li class="list-group-item">
                        <strong>Role:</strong>
                        @if(auth()->user()->role == 0)
                            Customer
                        @elseif(auth()->user()->role == 1)
                            Seller
                        @else
                            Admin
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
