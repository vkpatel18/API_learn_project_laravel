<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class API extends Model
{
    use HasFactory;
    protected $table = "api_db";
    protected $primaryKey = "API_ID";
    public $timestamps = false;
}
