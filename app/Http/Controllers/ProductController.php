<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Product_category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**.
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::paginate(10);
        $category =  Category::all();
        return view('admin.product.index', [
            'products' => $products,
            'categories'=>$category,


        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories =  Category::all();
        $products =  Product::all();

        $allcategories = Category::select('id' , 'name')->get();

        return view('admin.product.create',compact('categories','products' , 'allcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = array();
        $files = $request->file('image');
        if($files){
            foreach($files as $file){
                $imageName = time();
                $ext = strtolower($file->getClientOriginalExtension());
                $imageFullName = $imageName . '.' . $ext;
                $uploadPath = "images/";
                $imageUrl = $uploadPath.$imageFullName;
                $file->move($uploadPath , $imageFullName);
                $image[]=$imageUrl;
            }
        }

        $paths = implode(',', $image);


        $productRequest = new Product;
        $productRequest->name = $request->name;
        $productRequest->description =$request->description;
        $productRequest->price =$request->price;
        $productRequest->image =$paths;
        $productRequest->save();

        foreach ($request->category_id as $cat_id){
            Product_category::insert([
                'category_id'=>$cat_id,
                'product_id' =>$productRequest->id
            ]);
        }
        return redirect("admin/product");
     }

//

    public function getProductCategory($product_id)
    {
        $categories = Product_category::join('categories', 'categories.id', '=',
         'product_categories.category_id')->where('product_categories.product_id',
          $product_id)-> select('categories.id','categories.name')->get();

         return view('admin.product.showCategory', compact('categories'));

    }
    public function saveCategoryProduct(Request $request)
    {
        return $request;
    }

    public function edit($id): View
    {
        $product = Product::find($id);
        $categories =  Category::all();
        return view('admin.product.edit', compact('product','categories'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $product =  product::find($request->id);

        $product->update($request->except(['_token']));
        return redirect("admin/product");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $product =  product::find($id);
        $product->delete();
        return redirect('admin/product');
    }



    // Search API with name
    public function search($name  ){

        return Product::where("name" ,"like","%". $name."%")->get()  ;
    }


    // filter API with category_id

    public function filter($id){

        return Product::where("category_id" , $id)->get()  ;
    }
}