@extends("layout.FrontPage")

@section("content")
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">E-commerce Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('login-process') }}" method="post">
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
                            <label for="password" class="form-label">Password:</label>
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="{{ route('register-page') }}">Register</a></p>
                </div>
                @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

