<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    //
        public function getProductCategory($product_id){
            $product = Product::find($product_id);
            $categories = $product->categories;

            $products = Product::select('id' , 'name')->get();
            $allcategories = Category::select('id' , 'name')->get();

            return view('admin.product.showCategory' , compact('categories' , 'products' , 'allcategories'));

        }
        public function saveCategoryProduct(Request $request){
            return $request;
        }


}