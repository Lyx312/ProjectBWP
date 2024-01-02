<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "users";
    protected $primaryKey = "username";
    public $incrementing = false;
    public $timestamps = true;
}
