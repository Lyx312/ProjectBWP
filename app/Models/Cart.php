<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    protected $primaryKey = "cart_id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        "cart_id",
        "cart_item_id",
        "cart_item_price",
        "cart_item_quantity",
        "cart_subtotal",
        "cart_owner"
    ];

    public function User(){
        return $this->belongsTo(User::class, "cart_owner", "username");
    }

    public function Item(){
        return $this->hasMany(Item::class, "item_id", "cart_item_id");
    }

}