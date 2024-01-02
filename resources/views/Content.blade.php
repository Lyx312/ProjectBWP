@extends("layout.Home")

@section("content")

{{-- ini masih tidak jelas  --}}
<div class="container">
    <div class="row">
        <!-- Featured Products Section -->
        <div class="col-md-8 mb-4">
            <h2>Featured Products</h2>
            <!-- Featured products -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">Product 1</h5>
                            <p class="card-text">Product description goes here.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">Product 2</h5>
                            <p class="card-text">Another product description.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">Product 3</h5>
                            <p class="card-text">Description for the third product.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Categories Section -->
        <div class="col-md-4 mb-4">
            <h2>Popular Categories</h2>
            <!-- Popular categories -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category 1</h5>
                            <a href="#" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category 2</h5>
                            <a href="#" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category 3</h5>
                            <a href="#" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
