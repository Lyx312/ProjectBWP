@extends('layout.Home')

<style>
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }

    label[for]:hover {
        cursor: pointer;
    }

    .rating .stars label:before {
        content: "★";
    }

    .stars label {
        color: lightgray;
        font-size: 3vh;
    }

    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }

    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }

    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }
</style>

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="w-75 row pt-5">
            <div class="col-3">
                <img src="{{asset("storage/$item->item_image")}}" alt="item_image" width="100%">

                <div>
                    <h3>Overall Rating</h3>
                    <div class="d-flex">
                        <img class="star align-self-baseline mt-2" width="20px" height="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAMAAAAM7l6QAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABFUExURfakAPelAPakAPekAPakAPelAPalAEdwTP+vAPiuAPakAPqoAPalAPalAPelAP/WAP/TAP/MAP/PAP/bAPq1APy/AP7HAGxqCN8AAAAPdFJOU/5Lu2byeuMADP2nIMmTOjbD1MQAAAD7SURBVCjPhdNbkoMgEAXQq4KhAZWn+1/qAFFjk5TTH1pwuIoIeD0WeFPJR5ZCPbASkA8sQTzOWM3keBw8HGJicfBwjIHF7zzBx8jj6MJxY/HGZpiWcQb8VjwShNVyWlXjpfSXopT3rZXLKVHtErPBS1kk77a+wg5M9eFqRP7SzVHR9u7qrqtAGM6pffuhx4c1D8GFAuUeTr2+WyOHqzyJoVsWkW58rczJ6p4OWDpekf2nyHY8YW/wvibR8YLanQmpDkgwnEfye8FZowzYM7qZi1SxLKNpA86pH2zqD5LvfbCOpaEZDxDLZ5OsFpax1Ibt6GH+eUr+OWN9/QE2YB+QdE4J4wAAAABJRU5ErkJggg==">
                        <h1>{{$reviews->avg('review_rating')==null?5:$reviews->avg('review_rating')}}</h1>
                        <h5 class="align-self-end">/5</h5>
                    </div>
                    <p>{{$reviews->count()}} reviews</p>
                </div>
            </div>
            <div class="col-6">
                <div class="card p-3">
                    <h4><b>{{$item["item_name"]}}</b></h4>
                    <h6>{{$item->Category->category_name}}</h6>
                    @if (isset($discount))
                        <h5 class="text-danger" style="text-decoration: line-through"><b>Rp{{number_format($item["item_price"], 0, ",", ".")}}</b></h5>
                        <h2><b>Rp{{number_format($item["item_price"]*((100-$discount["discount_amount"])/100), 0, ",", ".")}}</b></h2>
                        <p>{{$discount["discount_name"]}} {{$discount["discount_amount"]}}% OFF</p>
                    @else
                        <h2><b>Rp{{number_format($item["item_price"], 0, ",", ".")}}</b></h2>
                    @endif

                    <p class="mt-5" style="height: 40vh">{{$item["item_description"]}}</p>
                    <hr>
                    <div class="d-flex align-items-center">
                        Seller:
                        <div style="margin-left: 10px; width: 30px; height: 30px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ asset('storage/' . $item->User->profile_picture) }}" alt="profile_picture" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <span class="mx-1">{{ $item->User->display_name }}</span>
                    </div>
                </div>

                <h3 class="mt-5">Reviews ({{count($reviews)}})</h3>
                <hr>
                @if (Auth::check())
                    <form action="{{route('post-review-process')}}" method="post" class="rating">
                        @csrf
                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li class="mx-3">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <p class="m-0">{{Session::get('success')}}</p>
                            </div>
                        @endif
                        <input type="hidden" name="review_item_id" value="{{$item->item_id}}">
                        <fieldset class="rating">
                            <div class="d-flex align-items-center">
                                <h5>Rating: </h5>
                                <input id="star1" type="radio" name="review_rating" value="1">
                                <input id="star2" type="radio" name="review_rating" value="2">
                                <input id="star3" type="radio" name="review_rating" value="3">
                                <input id="star4" type="radio" name="review_rating" value="4">
                                <input id="star5" type="radio" name="review_rating" value="5">
                                <div class="stars mx-2">
                                    <label for="star1" aria-label="1 star" title="1 star"></label>
                                    <label for="star2" aria-label="2 stars" title="2 stars"></label>
                                    <label for="star3" aria-label="3 stars" title="3 stars"></label>
                                    <label for="star4" aria-label="4 stars" title="4 stars"></label>
                                    <label for="star5" aria-label="5 stars" title="5 stars"></label>
                                </div>
                            </div>
                        </fieldset>
                        <textarea class="form-control" id="review_text" name="review_text" rows="5" placeholder="Give us your thoughts!"></textarea>
                        <div class="text-right pt-3">
                            <button type="submit" class="btn btn-primary">Post Review</button>
                        </div>
                    </form>
                    <hr>
                @endif
                @if (count($reviews) == 0)
                    <div class="d-flex align-items-center justify-content-center">
                        No reviews yet! Let the seller know what you think about the product!
                    </div>
                    <hr>
                @else
                    @foreach ($reviews as $review)
                        <div class="d-flex align-items-center">
                            <div style="margin-left: 10px; width: 30px; height: 30px; overflow: hidden; border-radius: 50%;">
                                <img src="{{ asset('storage/' . $review->User->profile_picture) }}" alt="profile_picture" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <span class="mx-1">{{ $review->User->display_name }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($review->review_rating < $i)
                                    <img class="star" width="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAMAAAAM7l6QAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAA/UExURf/XAPakAPalAPenAPakAPalAPenAEdwTP+vAP69APalAPivAPemAPmrAP+1APelAPakAPalAPmvAPioAPajAHElIkoAAAAUdFJOUxr0zm3rwngADSm3TZRFBqfggTda/y+eEwAAAPRJREFUKM+N09mShCAMBdCwNjuC9/+/dQDLaaCnrcmDVeSQCIL0egxah0Y8smbmgY1EeWANLs1XNlJF6K8s4Mkt5TMnqYjWctqKaS2f2BytmMjP5Z2TjSK4A6OYSIHxXM5qBpeWR88EMZSqDmrkJLf0MgrOW9qjCoazN28uPpQsbzre/Zdfeq08OehdmX9vbPdb732nPHvTuH6WxPLEv8d6s0GZmsuwccU5sVIbC9Sr73hmtnFgPX1yFvoEDVpZ8XZWCkdGn+CxrVzm6CBFetkMWex9qHcTHJD6ugfVtUFeOIKV9yWJCnxhEdYb7VdO//vH9vgB7woXsbjqY50AAAAASUVORK5CYII=">
                                @else
                                    <img class="star" width="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAMAAAAM7l6QAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABFUExURfakAPelAPakAPekAPakAPelAPalAEdwTP+vAPiuAPakAPqoAPalAPalAPelAP/WAP/TAP/MAP/PAP/bAPq1APy/AP7HAGxqCN8AAAAPdFJOU/5Lu2byeuMADP2nIMmTOjbD1MQAAAD7SURBVCjPhdNbkoMgEAXQq4KhAZWn+1/qAFFjk5TTH1pwuIoIeD0WeFPJR5ZCPbASkA8sQTzOWM3keBw8HGJicfBwjIHF7zzBx8jj6MJxY/HGZpiWcQb8VjwShNVyWlXjpfSXopT3rZXLKVHtErPBS1kk77a+wg5M9eFqRP7SzVHR9u7qrqtAGM6pffuhx4c1D8GFAuUeTr2+WyOHqzyJoVsWkW58rczJ6p4OWDpekf2nyHY8YW/wvibR8YLanQmpDkgwnEfye8FZowzYM7qZi1SxLKNpA86pH2zqD5LvfbCOpaEZDxDLZ5OsFpax1Ibt6GH+eUr+OWN9/QE2YB+QdE4J4wAAAABJRU5ErkJggg==">
                                @endif
                            @endfor
                            <p class="m-0 mx-2">{{$review->created_at->format('j F Y - H:i')}}</p>

                        </div>
                        <p>{{$review->review_text}}</p>

                        <hr>
                    @endforeach
                @endif


            </div>
            <div class="col-3">
                <form class="card p-3" method="POST" action="{{route("add-to-cart", $item["item_id"])}}">
                    @csrf
                    <h4>Buy Item</h4>

                    <input type="hidden" name="item_id" value="{{$item["item_id"]}}">
                    <div class="rounded border border-tertiary d-flex justify-content-center" style="width: 50%">
                        <button type="button" class="bg-light border-0 w-25" id="down" onclick="updateSpinner(this, {{ isset($discount) ? $item['item_price'] * ((100 - $discount['discount_amount'])/100) : $item['item_price'] }});" style="outline: none">-</button>
                        <input class="form-text text-center align-middle" name="item_quantity" id="itemQty" value="0" type="text" style="width:50px; display: inline; border: none; outline: none; text-align" readonly>
                        <button type="button" class="bg-light border-0 w-25" id="up" onclick="updateSpinner(this, {{ isset($discount) ? $item['item_price'] * ((100 - $discount['discount_amount'])/100) : $item['item_price']  }});" style="outline: none">+</button>
                    </div>

                    <p id="stock"><b>Stock: {{$item["item_stock"]}}</b></p>

                    <h5 id="subtotal" class="my-3">Subtotal: Rp0</h5>
                    <input type="hidden" name="subtotal" id="hiddenSub">

                    <button type="submit" class="btn btn-success mt-3">Add to Cart</button>
                </form>
            </div>



        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function updateSpinner(obj, itemPrice)
    {
        var value = parseInt($(itemQty).val());
        var maxValue = parseInt($(stock).text().replace("Stock: ", ""));

        if(isNaN(value) || value<0 || value>maxValue){
            $(itemQty).val(0);
            return;
        } else {
            if(obj.id == "down" && value >= 1) {
                value--;
            } else if(obj.id == "up" && value < maxValue){
                value++;
            }
        }
        $(itemQty).val(value);

        subtotalVal = value * itemPrice;
        $(subtotal).text("Subtotal: Rp" + subtotalVal.toLocaleString("id-ID"));
        $(hiddenSub).val(subtotalVal);
    }
</script>
