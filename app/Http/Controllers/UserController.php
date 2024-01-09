<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function test() {
        $table = Order::Find(1);
        $test = $table->OrderDetail;
        dd($test);
    }

    public function getLoginPage() {
        Session::forget("isAdmin");
        return view('Login');
    }

    public function getRegisterPage() {
        return view('Register');
    }

    public function getCustomerPage() {
        return view('Katalog');
    }

    public function getSellerPage() {
        $items = Item::get()->where("item_seller", "=", Auth::user()->username);
        $categories = Category::all();
        $param["items"] = $items;
        $param["categories"] = $categories;
        return view('Seller', $param);
    }

    public function getAdminPage() {
        return view('Admin');
    }

    public function getShopPage()
    {
        return view('layout.Shop');
    }

    public function loginProcess(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->username == "admin" && $request->password == "admin") {
            Session::put('isAdmin', true);
            return redirect('admin');
        } else if (Auth::attempt($credential)){
            if (Auth::user()->role == 0) {
                return redirect()->intended('customer');
            } else {
                return redirect('seller');
            }
        } else {
            return redirect("login")->with("error", "Login Failed");
        }

        return view("login");
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'name' => 'required|string',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'phone_number' => 'required|digits:9',
            'address' => 'required|string',
        ]);

        $user = new User([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        // if (Auth::attempt($credential)){
        //     return view('layout.FrontPage');
        // } else {
        //     return redirect("login")->with("error", "Login Failed");
        // }

        $user->save();

    // Redirect to a success page or do something else
        return redirect()->route('login-page')->with('success', 'Registration successful. Please log in.');
    }

    public function logoutProcess(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::forget('isAdmin');
        return redirect("login");
    }

    public function index(){
        $daftarUser = User::all();
        $param["daftarUser"] = $daftarUser;
        return view("Admin", $param);
    }

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

    public function addItemProcess(Request $req) {
        // insert validation here

        Item::create([
            "item_name" => $req->item_name,
            "item_description" => $req->item_description,
            "item_price" => $req->item_price,
            "item_stock" => $req->item_stock,
            "item_category" => $req->item_category,
            "item_seller" => Auth::user()->username
        ]);
        return redirect('seller');
    }
}
