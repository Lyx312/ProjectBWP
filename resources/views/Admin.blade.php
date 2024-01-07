@extends("layout.Home")

@section("content")
<a href="{{url('logout')}}" class="btn btn-danger">Logout</a><br><br>

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
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->balance}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->is_banned}}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
