@extends('layout.Home')

@section('content')

<div class="container-fluid ">
    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome to Our E-Commerce Store</h2>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        {{-- icon icon di bawah carousel  --}}
        <div class="row justify-content-center align-items-center mt-3" >
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>
            <div class="col-md-1 mb-3" style="width: 5rem;">
                <div class="card rounded-circle text-center" style="width: 4rem; height: 4rem;">
                    <a href="#"><img src="https://cf.shopee.co.id/file/id-50009109-21067727429e50037f52d3bda8a8bcf6_xhdpi" class="card-img-top rounded-circle" alt="Product 1"></a>
                </div>
            </div>

        </div>
        {{-- end icon dibawah carousel --}}
    </div>

    <div class="container mt-4 border rounded shadow">
        <h2 class="text-start mb-4">Trending Products</h2>
        <div class="row justify-content-center align-items-center">
            <!-- Trending Products -->
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h3 class="text-primary font-semibold mb-2">Product </h3>
                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container mt-4 border rounded shadow">
        <div class="row justify-content-between align-items-center mb-4">
            <h2 class="text-start">Discount Product </h2>
            <a href="" class="text-end px-3" style="text-decoration: none">See All
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right mb-1" viewBox="0 0 16 16">
                    <path d="M2 8a.5.5 0 0 1 .5-.5h9.793L9.147 4.354a.5.5 0 0 1 .708-.708l5 5a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708-.708L12.293 9.5H2.5a.5.5 0 0 1-.5-.5z"/>
                </svg>

            </a>
        </div>
        <div class="row justify-content-center align-items-center">
            <!-- Discount Products -->
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 15%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 30%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 35%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3 ">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/600x400" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">

                        <p class="text-primary mb-3">Price: ${{ rand(20, 100) }}</p>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 40%"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
@endsection
