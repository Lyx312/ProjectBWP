<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "items";
    protected $primaryKey = "item_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "item_id",
        "item_name",
        "item_description",
        "item_image",
        "item_price",
        "item_stock",
        "item_category",
        "item_seller"
    ];

    public function User(){
        return $this->belongsTo(User::class, "item_seller", "username");
    }

    public function OrderDetail(){
        return $this->belongsTo(OrderDetail::class, "item_id", "detail_item_id");
    }

    public function Cart(){
        return $this->belongsTo(Cart::class, "item_id", "cart_item_id");
    }

    public function Category(){
        return $this->belongsTo(Category::class,"item_category" , "category_id");
    }

    public function Discount(){
        return $this->hasOne(Discount::class,"discount_item_id" , "item_id");
    }
}
