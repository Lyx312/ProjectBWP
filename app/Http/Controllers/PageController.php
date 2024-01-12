<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use App\Models\OrderDetail;
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
        $items = Item::all();
        $param["item"] = $items;
        $param["discountedItems"] = $items->filter(function ($item) {
            return $item->discount !== null;
        });
    
        // Calculate trending items
        $trendingItems = OrderDetail::select('detail_item_id')
            ->groupBy('detail_item_id')
            ->orderByRaw('COUNT(*) DESC')
            ->take(3)
            ->get();
    
        // Get the items for the trending item IDs
        $param["trendingItems"] = Item::whereIn('item_id', $trendingItems->pluck('detail_item_id'))->get();
    
        return view('Katalog', $param);
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
        $deletedItems = Item::onlyTrashed()->where("item_seller", "=", Auth::user()->username)->get();
        $categories = Category::all();

        $user = User::with('Item.Discount')->find(Auth::user()->username);

        $activeDiscounts = collect();
        $pastDiscounts = collect();
        $upcomingDiscounts = collect();


        $discounts = Discount::whereHas('Item', function ($query) use ($user) {
            $query->where('item_seller', $user->username);
        })->get();

        $currentDate = now();
        foreach ($discounts as $discount) {
            if ($currentDate->isBefore($discount->discount_start_date)) {
                $upcomingDiscounts->push($discount);
            } elseif ($currentDate->isBetween($discount->discount_start_date, $discount->discount_end_date)) {
                $activeDiscounts->push($discount);
            } else {
                $pastDiscounts->push($discount);
            }
        }

        $param["items"] = $items;
        $param["deletedItems"] = $deletedItems;
        $param["categories"] = $categories;
        $param["activeDiscounts"] = $activeDiscounts;
        $param["pastDiscounts"] = $pastDiscounts;
        $param["upcomingDiscounts"] = $upcomingDiscounts;

        return view('Seller', $param);
    }

    public function getAdminPage() {
        $daftarUser = User::all();
        $param["daftarUser"] = $daftarUser;
        return view("Admin", $param);
    }

    public function getShopPage()
    {
        $sellerItems = Item::with('User')
            ->whereHas('User', function ($query) {
                $query->where('is_banned', 0);
            })
            ->get();
        $param["sellerItems"] = $sellerItems;
        $param["categoryIsOn"] = false;
        return view('layout.Shop',$param);
    }

    public function getCategoryPage($categoryID)
    {
        $sellerItems = Item::with('User')
            ->whereHas('User', function ($query) {
                $query->where('is_banned', 0);
            })
            ->where('item_category', $categoryID)
            ->get();
            $param["sellerItems"] = $sellerItems;
            $param["categoryIsOn"] = true;
            $param["category"] = Category::Find($categoryID);
            return view('layout.Shop',$param);
    }
}
