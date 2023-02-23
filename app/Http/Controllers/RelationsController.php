<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    //
    public function getProductCategory($product_id)
    {
        $categories = Product_category::join('categories', 'categories.id', '=', 'product_categories.category_id')->
            where('product_categories.product_id', $product_id)->
            select('categories.name')->get();
        // dd($categories); 
        return view('admin.product.showCategory', compact('categories'));

    }
    public function saveCategoryProduct(Request $request)
    {
        return $request;
    }


}