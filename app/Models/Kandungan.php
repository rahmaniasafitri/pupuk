<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandungan extends Model
{
    use HasFactory;
    
    public $table = "kandungan";
    protected $guarded = ['id'];
    public $timestamps = false;
}
