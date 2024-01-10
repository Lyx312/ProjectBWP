<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getDiscount($itemID) {
        return Discount::where('discount_item_id', $itemID)
                            ->where('discount_start_date', '<=', now())
                            ->where('discount_end_date', '>=', now())
                            ->first();
    }

    public function getDetailPage($itemID) {
        $item = Item::find($itemID);
        $discount = $this->getDiscount($itemID);

        $param["item"] = $item;
        if ($discount != null) $param["discount"] = $discount;

        return view('Detail', $param);
    }

    public function addToCartProcess(Request $req) {
        if ($req->item_quantity == 0) {
            return back()->with("error", "Item quantity must be more than 0");
        }

        $item = Item::find($req->item_id);
        $discount = $this->getDiscount($req->item_id);

        Cart::create([
            "cart_item_id" => $item->item_id,
            "cart_item_price" => $item->item_price,
            "cart_discount_id" => $discount==null?null:$discount->discount_id,
            "cart_item_quantity" => $req->item_quantity,
            "cart_subtotal" => $req->subtotal,
            "cart_owner" => Auth::user()->username
        ]);

        return redirect('cart');
    }

    public function getCartPage() {
        $cart = Cart::where('cart_owner', '=', Auth::user()->username)->get();
        $param["cart"] = $cart;

        return view('Cart', $param);
    }
}
