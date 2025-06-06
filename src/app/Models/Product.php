<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'description'];

    public static $rules = array(
        // 'id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'image' => 'required',
        'description' => 'required',

    );
}
