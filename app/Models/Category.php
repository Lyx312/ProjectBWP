<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "category_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "category_id",
        "category_name",
    ];

    public function Item(){
        return $this->hasMany(Item::class, "item_category", "category_id");
    }
}
