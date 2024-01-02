<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "items";
    protected $primaryKey = "item_id";
    public $incrementing = true;
    public $timestamps = true;
}
