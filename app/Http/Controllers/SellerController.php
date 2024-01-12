<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function masterItemProcess(Request $req) {
        if ($req->has('item_add')) {
            // add item
            $req->validate([
                'item_name' => 'required|string|max:255',
                'item_description' => 'required|string',
                'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'item_price' => 'required|numeric|min:1000',
                'item_stock' => 'required|numeric|min:1',
                'item_category' => 'required|exists:categories,category_id',
            ], [
                'item_name.required' => ':attribute is required.',
                'item_name.string' => ':attribute must be a string.',
                'item_name.max' => ':attribute may not be greater than :max characters.',
                'item_description.required' => ':attribute is required.',
                'item_description.string' => ':attribute must be a string.',
                'item_image.required' => ':attribute is required.',
                'item_image.image' => ':attribute must be an image.',
                'item_image.mimes' => ':attribute must be a file of type: :values.',
                'item_image.max' => ':attribute may not be greater than :max kilobytes.',
                'item_price.required' => ':attribute is required.',
                'item_price.numeric' => ':attribute must be a number.',
                'item_price.min' => ':attribute must be at least :min.',
                'item_stock.required' => ':attribute is required.',
                'item_stock.numeric' => ':attribute must be a number.',
                'item_stock.min' => ':attribute must be at least :min.',
                'item_category.required' => ':attribute is required.',
                'item_category.exists' => 'The selected :attribute is invalid.',
            ], [
                'item_name' => 'Item Name',
                'item_description' => 'Item Description',
                'item_image' => 'Item Image',
                'item_price' => 'Item Price',
                'item_stock' => 'Item Stock',
                'item_category' => 'Item Category',
            ]);

            $latestItem = Item::latest()->first();
            $lastItemId = $latestItem ? $latestItem->item_id : 0;
            $imageName = "ItemImage" . ($lastItemId+1);
            $imageExtension = $req->item_image->extension();

            $imagePath = Storage::putFileAs('public/ItemImages', $req->item_image, "$imageName.$imageExtension");

            $item = Item::create([
                "item_name" => $req->item_name,
                "item_description" => $req->item_description,
                "item_image" => 'ItemImages/' . "$imageName.$imageExtension",
                "item_price" => $req->item_price,
                "item_stock" => $req->item_stock,
                "item_category" => $req->item_category,
                "item_seller" => Auth::user()->username
            ]);
            return redirect('seller')->with('success', "Item $item->item_name with id $item->item_id added");
        } else if ($req->has('item_update')) {
            // update item

            $req->validate([
                'item_name' => 'required|string|max:255',
                'item_description' => 'required|string',
                'item_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
                'item_price' => 'required|numeric|min:1000',
                'item_stock' => 'required|numeric|min:1',
                'item_category' => 'required|exists:categories,category_id',
            ], [
                'item_name.required' => ':attribute is required.',
                'item_name.string' => ':attribute must be a string.',
                'item_name.max' => ':attribute may not be greater than :max characters.',
                'item_description.required' => ':attribute is required.',
                'item_description.string' => ':attribute must be a string.',
                'item_image.image' => ':attribute must be an image.',
                'item_image.mimes' => ':attribute must be a file of type: :values.',
                'item_image.max' => ':attribute may not be greater than :max kilobytes.',
                'item_price.required' => ':attribute is required.',
                'item_price.numeric' => ':attribute must be a number.',
                'item_price.min' => ':attribute must be at least :min.',
                'item_stock.required' => ':attribute is required.',
                'item_stock.numeric' => ':attribute must be a number.',
                'item_stock.min' => ':attribute must be at least :min.',
                'item_category.required' => ':attribute is required.',
                'item_category.exists' => 'The selected :attribute is invalid.',
            ], [
                'item_name' => 'Item Name',
                'item_description' => 'Item Description',
                'item_image' => 'Item Image',
                'item_price' => 'Item Price',
                'item_stock' => 'Item Stock',
                'item_category' => 'Item Category',
            ]);

            $item = Item::find($req->item_id);
            if ($req->hasFile('profile_picture')) {
                $imageName = "ItemImage$item->item_id";
                $imageExtension = $req->item_image->extension();
                try {
                    Storage::putFileAs('public/ItemImages', $req->item_image, "$imageName.$imageExtension");
                    $item->item_image = 'ItemImages/' . "$imageName.$imageExtension";
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error storing item image.');
                }
            }

            $item->item_name = $req->item_name;
            $item->item_description = $req->item_description;
            $item->item_price = $req->item_price;
            $item->item_stock = $req->item_stock;
            $item->item_category = $req->item_category;

            $item->save();

            return redirect('seller')->with('success', "Item $item->item_name with id $item->item_id updated");
        }
    }

    public function deleteItemProcess($itemID) {
        $item = Item::find($itemID);

        if (!$item) {
            return redirect('seller')->with('error', "Item with id $itemID not found");
        }

        $item->delete();

        return redirect('seller')->with('success', "Item $item->item_name with id $item->item_id deleted");
    }

    public function restoreItemProcess($itemID) {
        $item = Item::withTrashed()->find($itemID);

        if (!$item) {
            return redirect('seller')->with('error', "Item with id $itemID not found");
        }

        $item->restore();

        return redirect('seller')->with('success', "Item $item->item_name with id $item->item_id restored");
    }


    public function masterDiscountProcess(Request $req) {
        if ($req->has('discount_add')) {
            // add discount
            $req->validate([
                'discount_name' => 'required|string|max:255',
                'discount_item_id' => 'required|exists:items,item_id',
                'discount_amount' => 'required|numeric|min:1|max:100',
                'discount_start_date' => 'required|before:discount_end_date',
                'discount_end_date' => 'required|date',
            ], [
                'discount_name.required' => ':attribute is required.',
                'discount_name.string' => ':attribute must be a string.',
                'discount_name.max' => ':attribute may not be greater than :max characters.',
                'discount_item_id.required' => ':attribute is required.',
                'discount_item_id.exists' => 'The selected :attribute is invalid.',
                'discount_amount.required' => ':attribute is required.',
                'discount_amount.numeric' => ':attribute must be a number.',
                'discount_amount.min' => ':attribute must be at least :min.',
                'discount_amount.max' => ':attribute must be at most :max.',
                'discount_start_date.required' => ':attribute is required.',
                'discount_end_date.required' => ':attribute is required.',
            ], [
                'discount_name' => 'Discount Name',
                'discount_item_id' => 'Item',
                'discount_amount' => 'Discount Amount',
                'discount_start_date' => 'Start Date',
                'discount_end_date' => 'End Date',
            ]);

            $discount = Discount::create([
                "discount_name" => $req->discount_name,
                "discount_item_id" => $req->discount_item_id,
                "discount_amount" => $req->discount_amount,
                "discount_start_date" => $req->discount_start_date,
                "discount_end_date" => $req->discount_end_date,
            ]);

            return redirect('seller')->with('success', "Discount $discount->discount_name for item ".  $discount->Item->item_name . " with id $discount->discount_id added");
        } else if ($req->has('discount_update')) {
            // update discount

            $req->validate([
                'discount_name' => 'required|string|max:255',
                'discount_item_id' => 'required|exists:items,item_id',
                'discount_amount' => 'required|numeric|min:1|max:100',
                'discount_start_date' => 'required|before:discount_end_date',
                'discount_end_date' => 'required|date',
            ], [
                'discount_name.required' => ':attribute is required.',
                'discount_name.string' => ':attribute must be a string.',
                'discount_name.max' => ':attribute may not be greater than :max characters.',
                'discount_item_id.required' => ':attribute is required.',
                'discount_item_id.exists' => 'The selected :attribute is invalid.',
                'discount_amount.required' => ':attribute is required.',
                'discount_amount.numeric' => ':attribute must be a number.',
                'discount_amount.min' => ':attribute must be at least :min.',
                'discount_amount.max' => ':attribute must be at most :max.',
                'discount_start_date.required' => ':attribute is required.',
                'discount_end_date.required' => ':attribute is required.',
            ], [
                'discount_name' => 'Discount Name',
                'discount_item_id' => 'Item',
                'discount_amount' => 'Discount Amount',
                'discount_start_date' => 'Start Date',
                'discount_end_date' => 'End Date',
            ]);

            $discount = Discount::find($req->discount_id);

            $discount->discount_name = $req->discount_name;
            $discount->discount_item_id = $req->discount_item_id;
            $discount->discount_amount = $req->discount_amount;
            $discount->discount_start_date = $req->discount_start_date;
            $discount->discount_end_date = $req->discount_end_date;

            $discount->save();

            return redirect('seller')->with('success', "Discount $discount->discount_name for item ".  $discount->Item->item_name . " with id $discount->discount_id updated");
        }
    }
}
