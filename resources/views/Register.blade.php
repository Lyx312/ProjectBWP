@extends("layout.FrontPage")

@section("content")
    <div class="container mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">E-commerce Registration</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('register-process') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Email:</label>
                            <input type="password" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Phone Number:</label>
                            <input type="password" class="form-control" id="phone_number" name="phone_number">
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
