<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    protected $fillable = [
        'category_id',
        'product_id'

    ];


    use HasFactory;
}