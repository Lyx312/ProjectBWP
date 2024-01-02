<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "order_details";
    protected $primaryKey = "detail_id";
    public $incrementing = true;
    public $timestamps = true;
}
