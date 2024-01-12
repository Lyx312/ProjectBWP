@extends("layout.Home")

@section("content")
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="margin-bottom: 10%">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">E-commerce Registration</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('register-process') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            @if($errors->has('username'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
                        </div>

                        <div class="mb-3">
                            <label for="display_name" class="form-label">Display Name:</label>
                            @if($errors->has('display_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('display_name') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="display_name" name="display_name" value="{{old('display_name')}}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            @if($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number:</label>
                            @if($errors->has('phone_number'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            @if($errors->has('address'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-control" id="role" name="role">
                                <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Customer</option>
                                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Seller</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="{{ route('login-page') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
