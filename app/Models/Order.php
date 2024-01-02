<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "orders";
    protected $primaryKey = "order_id";
    public $incrementing = true;
    public $timestamps = true;
}
