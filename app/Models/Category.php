<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'

    ];

    public function products()
    {
        return $this->belongsToMany(Product::class ,
        table:'product_categories' ,foreignPivotKey:'category_id'
         ,relatedPivotKey:'product_id',parentKey:'id' , relatedKey:'id' )->withTimestamps();


    }

}