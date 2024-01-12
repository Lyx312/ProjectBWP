<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $cartOwner = Auth::user()->username;

        $existingCartItem = Cart::where('cart_item_id', $item->item_id)
                                ->where('cart_owner', $cartOwner)
                                ->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'cart_item_quantity' => $existingCartItem->cart_item_quantity + $req->item_quantity,
                'cart_subtotal' => $existingCartItem->cart_subtotal + $req->subtotal,
            ]);
        } else {
            Cart::create([
                "cart_item_id" => $item->item_id,
                "cart_item_price" => $item->item_price,
                "cart_discount_id" => $discount == null ? null : $discount->discount_id,
                "cart_item_quantity" => $req->item_quantity,
                "cart_subtotal" => $req->subtotal,
                "cart_owner" => $cartOwner
            ]);
        }

        return redirect('cart');
    }

    protected function getDiscount($itemId)
    {
        return Discount::where('discount_item_id', $itemId)
            ->where('discount_start_date', '<=', now())
            ->where('discount_end_date', '>=', now())
            ->first();
    }

    public function getCartPage() {
        $cart = Cart::where('cart_owner', '=', Auth::user()->username)->get();
        $cartSubtotal = 0;
        $cartTotalItems = 0;

        foreach ($cart as $cartItem) {
            if (isset($cartItem->Discount)) {
                $cartSubtotal += $cartItem->Discount->discount_amount * $cartItem->cart_subtotal / 100;
            }
            else{
                $cartSubtotal += $cartItem->cart_subtotal;
            }
            $cartTotalItems += $cartItem->cart_item_quantity;
        }

        $param["cart"] = $cart;
        $param["cartSubtotal"] = $cartSubtotal;
        $param["cartTotalItems"] = $cartTotalItems;

        return view('Cart', $param);
    }

    public function topUpProcess(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:50000',
            'payment_method' => 'required',
        ], [
            'jumlah.required' => ':attribute is required.',
            'jumlah.numeric' => ':attribute must be a number.',
            'jumlah.min' => ':attribute cant be 50000 or lower.',
            'payment_method.required' => ':attribute is required.',
        ],
        [
            'jumlah' => 'Payment amount',
            'payment_method' => 'Payment method',
        ]);

        $user = User::where('username', Auth::user()->username)->first();

        // Update user's balance
        $user->balance += $request->jumlah;
        $user->save();

        // Redirect back to the top-up page with a success message
        return redirect()->route('Topup-page')->with('success', 'Top-up successful. Your balance has been updated.');
    }
    public function removeFromCart(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($cart) {
            $cart->delete();
        } else {
            return redirect()->route('Cart-page')->with('error', 'Cart item not found.');
        }

        return redirect()->route('Cart-page');
    }

    public function doCheckout()
    {
        $cart = Cart::where('cart_owner', Auth::user()->username)->get();
        $cartNow = Cart::where('cart_owner', Auth::user()->username)->first();
        //dd($cartNow);
        if ($cart->isEmpty()) {
            return redirect()->route('Cart-page')->with('error', 'Cannot checkout with an empty cart.');
        }

        $total = 0;
        foreach ($cart as $cartSubtotal) {
            if (isset($cartSubtotal->Discount)) {
                $total += $cartSubtotal->Discount->discount_amount * $cartSubtotal->cart_subtotal / 100;
            }
            else{
                $total += $cartSubtotal->cart_subtotal;
            }
        }

        if ($total>Auth::user()->balance) {
            return redirect()->route('Cart-page')->with('error', 'Your balance is not enough for this order!');
        }
        $user = Auth::user();
        $user->balance = $user->balance - $total;
        $user->save();
        $newOrder = Order::create([
            "order_buyer" => $cartNow->cart_owner,
            "order_total" => $total,
            ]);
        $newOrderId = $newOrder->order_id;
        foreach ($cart as $cartItem) {
            OrderDetail::create([
            "detail_order_id" => $newOrderId,
            "detail_item_id" => $cartItem->cart_item_id,
            "detail_item_price" => $cartItem->cart_item_price,
            "detail_discount_id" => $cartItem->cart_discount_id ?? null,
            "detail_item_quantity" => $cartItem->cart_item_quantity,
            "detail_subtotal" => $cartItem->cart_subtotal,
            ]);
            $item = Item::where('item_id', $cartItem->cart_item_id)->first();
            $item->item_stock = $item->item_stock - $cartItem->cart_item_quantity;
            $item->save();
            $seller = User::where('username', $item->item_seller)->first();
            $seller->balance = $seller->balance + (80 * $cartItem->cart_subtotal / 100);
            $seller->save();
        }
        Cart::where('cart_owner', Auth::user()->username)->delete();
        //dd($total);
        return redirect()->route('Cart-page')
            ->with('success', 'Your order has been successfully placed!')
            ->with('thank_you', 'Thank you for shopping at E-Commerce.');
    }
}
