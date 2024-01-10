<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function test() {
        $table = Item::Find(1);
        $test = $table->Discount;
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

    public function getAccountPage() {
        return view('Account');
    }

    public function getTopUpPage() {
        return view('TopUp');
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
