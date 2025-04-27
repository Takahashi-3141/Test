<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_id', 'season_id'];

    public static $rules = array(
        'name' => 'required',
        'product_id' => 'required',
        'season_id' => 'required',
    );
}
