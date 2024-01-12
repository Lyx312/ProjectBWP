@extends("layout.Home")

@section("content")
    <div class="container mt-5">
        <h1 class="mb-4">Welcome, {{ auth()->user()->display_name }}</h1>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center pb-3">
                    <div style="display: inline-block; margin-right: 10px; width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="profile_picture" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3 class="card-title" style="display: inline-block; margin: 0;">Account Information</h3>
                </div>

                @if ($errors->editProfile->any())
                    <ul>
                        @foreach ($errors->editProfile->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @if (Session::has("success-profile"))
                    {{Session::get('success-profile')}}
                @endif

                <div class="list-group list-group-flush px-3">
                    <form action="{{ route('edit-profile-process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Profile Picture:</strong></div>
                            <div class="col-10"><input type="file" name="profile_picture" id="profile_picture"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Username:</strong></div>
                            <div class="col-10">{{ auth()->user()->username }}</div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Display Name:</strong></div>
                            <div class="col-10"><input type="text" class="form-control" name="display_name" id="display_name" value="{{ auth()->user()->display_name }}"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Email:</strong></div>
                            <div class="col-10"><input type="text" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Phone Number:</strong></div>
                            <div class="col-10"><input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ auth()->user()->phone_number }}"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Address:</strong></div>
                            <div class="col-10"><input type="text" class="form-control" name="address" id="address" value="{{ auth()->user()->address }}"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Balance:</strong></div>
                            <div class="col-10">Rp{{ number_format(auth()->user()->balance , 0, ",", ".") }}</div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Role:</strong></div>
                            <div class="col-10">
                                @if(auth()->user()->role == 0)
                                    Customer
                                @elseif(auth()->user()->role == 1)
                                    Seller
                                @endif
                            </div>
                        </li>
                        <div class="row">
                            <div class="col-12 text-right pt-3">
                                <button type="submit" class="btn btn-primary">Edit Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card my-5">
            <div class="card-body">
                <div class="d-flex align-items-center pb-3">
                    <h3 class="card-title" style="display: inline-block; margin: 0;">Change Password</h3>
                </div>

                @if ($errors->changePassword->any())
                    <ul>
                        @foreach ($errors->changePassword->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @if (Session::has("success-password"))
                    {{Session::get('success-password')}}
                @endif

                <div class="list-group list-group-flush px-3">
                    <form action="{{route('change-password-process')}}" method="post">
                        @csrf
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Old Password:</strong></div>
                            <div class="col-10"><input type="Password" class="form-control" name="old_password" id="old_password"></div>
                        </li>
                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>New Password:</strong></div>
                            <div class="col-10"><input type="Password" class="form-control" name="password" id="password"></div>
                        </li>

                        <li class="row d-flex align-items-center list-group-item">
                            <div class="col-2"><strong>Confirm Password:</strong></div>
                            <div class="col-10"><input type="Password" class="form-control" name="password_confirmation" id="password_confirmation"></div>
                        </li>
                        <div class="row">
                            <div class="col-12 text-right pt-3">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
