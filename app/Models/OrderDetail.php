<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";
    protected $primaryKey = "detail_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "detail_id",
        "detail_order_id",
        "detail_item_id",
        "detail_item_price",
        "detail_item_quantity",
        "detail_subtotal"
    ];
}
