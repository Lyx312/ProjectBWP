<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = "discounts";
    protected $primaryKey = "discount_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "discount_id",
        "discount_name",
        "discount_item_id",
        "discount_amount",
        "discount_start_date",
        "discount_end_date",
    ];

    public function Item(){
        return $this->belongsTo(Item::class,"discount_item_id" , "item_id");
    }

    public function Cart(){
        return $this->hasMany(Cart::class, "cart_discount_id", "discount_id");
    }

    public function OrderDetail(){
        return $this->hasMany(Cart::class, "detail_discount_id", "discount_id");
    }
}
