<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;

    protected $connection = "db_project_bwp";
    protected $table = "personal_access_tokens";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
}
