<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function addItemProcess(Request $req) {
        // insert validation here
        $lastItemId = Item::latest()->first()->item_id;
        $imageName = "ImageItem" . ($lastItemId+1);
        $imageExtension = $req->item_image->extension();

        $imagePath = Storage::putFileAs('public/ItemImages', $req->item_image, "$imageName.$imageExtension");

        Item::create([
            "item_name" => $req->item_name,
            "item_description" => $req->item_description,
            "item_image" => 'ItemImages/' . "$imageName.$imageExtension",
            "item_price" => $req->item_price,
            "item_stock" => $req->item_stock,
            "item_category" => $req->item_category,
            "item_seller" => Auth::user()->username
        ]);
        return redirect('seller');
    }
}
