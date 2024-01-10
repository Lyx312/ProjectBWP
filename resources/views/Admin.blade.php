@extends("layout.Home")

@section("content")
<div class="container">
    <table class="table table-striped table-hover">
        <tr>
            <th>Username</th>
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
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->balance}}</td>
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
