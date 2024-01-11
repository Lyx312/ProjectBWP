<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
         .full-width-dropdown .dropdown-menu {
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                @if (Auth::check() && Auth::user()->role == 0)
                    <a class="nav-link" href="{{route('customer-page')}}">Home <span class="sr-only">(current)</span></a>
                @elseif (Auth::check() && Auth::user()->role == 1)
                    <a class="nav-link" href="{{route('seller-page')}}">Home <span class="sr-only">(current)</span></a>
                @elseif (Session::has('isAdmin'))
                    <a class="nav-link" href="{{route('admin-page')}}">Home <span class="sr-only">(current)</span></a>
                @else
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Shop-page')}}">Shop</a>
            </li>
            <li class="nav-item dropdown full-width-dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                    @foreach (\App\Models\Category::all() as $category)
                        <a class="dropdown-item" href="/shop/{{ $category->category_id }}" data-category-id="{{ $category->category_id }}">{{ $category->category_name }}</a>
                    @endforeach
                </div>
            </li>
            @if (Auth::check() && Auth::user()->role == 0)
                <li class="nav-item">
                    <a class="nav-link" href="{{route("Topup-page")}}">Top up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("Cart-page")}}">Cart</a>
                </li>
            @endif
            @if(Auth::check())
                <li class="nav-item" style="display: flex; align-items: center;">
                    <a href="{{ route('account-page') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                        <div style="width: 30px; height: 30px; overflow: hidden; border-radius: 50%; margin-left: 10px;">
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="profile_picture" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <span class="nav-link">{{ auth()->user()->display_name }}</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-danger" href="{{route('logout-process')}}">Logout</a>
                </li>
            @elseif (Session::has('isAdmin'))
                <li class="nav-item mx-2">
                    <p class="navbar-text">Admin</p>
                </li>
                <li class="nav-item mx-2">
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


<footer class="bg-dark text-light d-flex align-items-center" style="padding: 10px 24px 0px 24px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; 2024 M.I.E. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-right">
          <a href="https://www.facebook.com/istts.page/" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/900px-Facebook_f_logo_%282019%29.svg.png" alt="Facebook" class="text-light" style="width: 32px; height: 32px; margin-right: 10px;">
          </a>
          <a href="https://twitter.com/istts_sby" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/X_logo_2023_%28white%29.png/900px-X_logo_2023_%28white%29.png" alt="X" class="text-light" style="width: 32px; height: 32px; margin-right: 10px;">
          </a>
          <a href="https://www.instagram.com/haloistts/" target="_blank" rel="noopener noreferrer">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/900px-Instagram_logo_2022.svg.png" alt="Instagram" class="text-light" style="width: 32px; height: 32px; margin-right: 10px;">
          </a>
          <a href="https://id.linkedin.com/company/istts" target="_blank" rel="noopener noreferrer">
            <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png" alt="LinkedIn" class="text-light" style="width: 32px; height: 32px; margin-right: 10px;">
          </a>
        </div>
      </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
