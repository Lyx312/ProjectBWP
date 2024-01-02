<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = "db_project_bwp";
    protected $table = "items";
    protected $primaryKey = "item_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "item_id",
        "item_name",
        "item_description",
        "item_price",
        "item_stock",
        "item_category",
        "item_seller"
    ];
}
