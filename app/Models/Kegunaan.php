<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegunaan extends Model
{
    use HasFactory;

    public $table = "kegunaan";
    protected $guarded = ['id'];
    public $timestamps = false;
}
