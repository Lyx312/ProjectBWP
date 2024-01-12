@extends("layout.Home")

@section("content")
<div class="container" style="margin-bottom: 75px;">
    <form action="{{route('filter-user')}}" method="POST">
        @csrf
        <div class="mb-3 d-flex align-items-center">
            <label for="filter" class="form-label" style="width: 10vw">Role Filter: </label>
            <select class="form-control" name="filter" id="filter">
                <option value="-1">All</option>
                <option value="0">Customer</option>
                <option value="1">Seller</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
    <table class="table table-striped table-hover">
        <tr>
            <th>Username</th>
            <th>Display Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Balance</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
        @foreach ($daftarUser as $user)
            <tr @if($user->is_banned == 1) style="background-color: red;" @endif>
                <td>{{$user->username}}</td>
                <td>{{$user->display_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->address}}</td>
                <td>Rp.{{ number_format($user->balance, 0, ",", ".") }}</td>
                <td>
                    @if($user->role == 0)
                        Customer
                    @elseif($user->role == 1)
                        Seller
                    @endif
                </td>
                <td>
                    @if($user->is_banned == 0)
                        <a class="btn btn-danger" href='{{url("admin/ban/" . $user->username)}}'>Ban</a>
                    @elseif($user->is_banned == 1)
                        <a class="btn btn-primary" href='{{url("admin/ban/" . $user->username)}}'>Unban</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
