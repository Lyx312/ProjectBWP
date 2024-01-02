<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "migrations";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;
}
