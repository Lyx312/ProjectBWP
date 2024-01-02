<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $primaryKey = "order_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "order_id",
        "order_buyer",
        "order_total"
    ];
}
