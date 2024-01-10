<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function test() {
        $table = Item::Find(1);
        $test = $table->Review;
        dd($test);
    }

    public function getLoginPage() {
        Session::forget("isAdmin");
        return view('Login');
    }

    public function getRegisterPage() {
        return view('Register');
    }

    public function getKatalogPage() {
        return view('Katalog');
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
        $reviews = Review::where("review_item_id", "=", $itemID)->get();

        $param["item"] = $item;
        if ($discount != null) $param["discount"] = $discount;
        $param["reviews"] = $reviews;

        return view('Detail', $param);
    }

    public function getAccountPage() {
        return view('Account');
    }

    public function getSellerPage() {
        $items = Item::get()->where("item_seller", "=", Auth::user()->username);
        $categories = Category::all();
        $param["items"] = $items;
        $param["categories"] = $categories;
        return view('Seller', $param);
    }

    public function getAdminPage() {
        $daftarUser = User::all();
        $param["daftarUser"] = $daftarUser;
        return view("Admin", $param);
    }

    public function getShopPage()
    {
        return view('layout.Shop');
    }
}
