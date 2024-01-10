@extends('layout.Home')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="w-75 row pt-5">
            <div class="col-3">
                <img src="https://i.pinimg.com/originals/8a/39/03/8a390326148f845c0e26c23d56b7fde9.gif" alt="item_image" width="100%">

                <div>
                    <h3>Overall Rating</h3>
                    <div class="d-flex">
                        <img class="star align-self-baseline mt-2" width="20px" height="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAMAAAAM7l6QAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAABFUExURfakAPelAPakAPekAPakAPelAPalAEdwTP+vAPiuAPakAPqoAPalAPalAPelAP/WAP/TAP/MAP/PAP/bAPq1APy/AP7HAGxqCN8AAAAPdFJOU/5Lu2byeuMADP2nIMmTOjbD1MQAAAD7SURBVCjPhdNbkoMgEAXQq4KhAZWn+1/qAFFjk5TTH1pwuIoIeD0WeFPJR5ZCPbASkA8sQTzOWM3keBw8HGJicfBwjIHF7zzBx8jj6MJxY/HGZpiWcQb8VjwShNVyWlXjpfSXopT3rZXLKVHtErPBS1kk77a+wg5M9eFqRP7SzVHR9u7qrqtAGM6pffuhx4c1D8GFAuUeTr2+WyOHqzyJoVsWkW58rczJ6p4OWDpekf2nyHY8YW/wvibR8YLanQmpDkgwnEfye8FZowzYM7qZi1SxLKNpA86pH2zqD5LvfbCOpaEZDxDLZ5OsFpax1Ibt6GH+eUr+OWN9/QE2YB+QdE4J4wAAAABJRU5ErkJggg==">
                        <h1>{{$reviews->avg('review_rating')}}</h1>
                        <h5 class="align-self-end">/5</h5>
                    </div>
                </div>
            </div>
            <div class="col-6">
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
                <hr>

                <h3>Reviews</h3>
                <hr>
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

            </div>
            <div class="col-3">
                <form class="rounded border border-dark p-3" method="POST" action="{{route("add-to-cart", $item["item_id"])}}">
                    @csrf
                    <h4>Buy Item</h4>

                    <input type="hidden" name="item_id" value="{{$item["item_id"]}}">
                    <div class="rounded border border-dark d-flex justify-content-center" style="width: 40%">
                        <button type="button" class="bg-light border-0 w-25" id="down" onclick="updateSpinner(this, {{ isset($discount) ? $item['item_price'] * ((100 - $discount['discount_amount'])/100) : $item['item_price'] }});" style="outline: none">-</button>
                        <input class="form-text text-center align-middle" name="item_quantity" id="itemQty" value="0" type="text" style="width:50px; display: inline; border: none; outline: none; text-align">
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
