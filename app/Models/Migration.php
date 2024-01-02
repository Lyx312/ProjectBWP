<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    use HasFactory;

    protected $table = "migrations";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
}
