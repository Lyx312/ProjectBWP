<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";
    protected $primaryKey = "review_id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "review_id",
        "review_user",
        "review_item_id",
        "review_rating",
        "review_text",
    ];

    public function Item(){
        return $this->belongsTo(Item::class, "review_item_id", "item_id");
    }

    public function User(){
        return $this->belongsTo(User::class, "review_user", "username");
    }
}
