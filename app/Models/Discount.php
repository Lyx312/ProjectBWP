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
}
