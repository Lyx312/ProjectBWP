@extends('layout.Home')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="w-75 row pt-5">
            <div class="col-3">
                <img src="https://i.pinimg.com/originals/8a/39/03/8a390326148f845c0e26c23d56b7fde9.gif" alt="item_image" width="100%">
            </div>
            <div class="col-6">
                <h4><b>{{$item["item_name"]}}</b></h4>
                <h6>{{$item->Category->category_name}}</h6>
                <h2><b>Rp{{number_format($item["item_price"], 0, ",", ".")}}</b></h2>

                <p class="mt-5" style="height: 40vh">{{$item["item_description"]}}</p>
                <hr>
                <p>Seller: {{$item->User->name}}</p>
                <hr>
            </div>
            <div class="col-3">
                <form class="rounded border border-dark p-3" method="POST" action="{{route("add-to-cart", $item["item_id"])}}">
                    @csrf
                    <h4>Buy Item</h4>

                    <div class="rounded border border-dark d-flex justify-content-center" style="width: 40%">
                        <button type="button" class="bg-light border-0 w-25" id="down" onclick="updateSpinner(this, {{$item['item_price']}});" style="outline: none">-</button>
                        <input class="form-text text-center align-middle" id="itemQty" value="0" type="text" style="width:50px; display: inline; border: none; outline: none; text-align">
                        <button type="button" class="bg-light border-0 w-25" id="up" onclick="updateSpinner(this, {{$item['item_price']}});" style="outline: none">+</button>
                    </div>

                    <p id="stock"><b>Stock: {{$item["item_stock"]}}</b></p>

                    <h5 id="subtotal" class="my-3">Subtotal: Rp0</h5>

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
    }
</script>
