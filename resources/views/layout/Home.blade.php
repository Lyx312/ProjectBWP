<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Shop-page')}}">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cart</a>
            </li>
            @if(Auth::check())
                <li class="nav-item">
                    <p class="navbar-text">{{auth()->user()->name}}</p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{route('logout-process')}}">Logout</a>
                </li>
            @elseif (Session::has('isAdmin'))
                <li class="nav-item">
                    <p class="navbar-text">Admin</p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{route('logout-process')}}">Logout</a>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login-page')}}">Login</a>
            </li>
            @endif
        </ul>
    </div>
</nav>

@yield("content")

<!-- Bootstrap JS and Popper.js CDN (Make sure to include jQuery if needed) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
