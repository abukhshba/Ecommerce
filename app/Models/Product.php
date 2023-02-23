<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class , table:'product_categories'
        ,foreignPivotKey:'product_id' ,relatedPivotKey:'category_id',
        parentKey:'id' , relatedKey:'id'  )->withTimestamps();

    }
}