<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getTopUpPage() {
        return view('TopUp');
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

    public function topUpProcess(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:0',
            'payment_method' => 'required|in:bank_transfer,e_wallet',
        ], [
            'jumlah.required' => ':attribute is required.',
            'jumlah.numeric' => ':attribute must be a number.',
            'jumlah.min' => ':attribute cant be 0 or lower.',
            'payment_method.required' => ':attribute is required.',
        ]);

        $user = User::where('username', Auth::user()->username)->first();

        // Update user's balance
        $user->balance += $request->jumlah;
        $user->save();

        // Redirect back to the top-up page with a success message
        return redirect()->route('Topup-page')->with('success', 'Top-up successful. Your balance has been updated.');
    }
}
