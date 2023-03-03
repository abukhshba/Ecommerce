<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
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
        $images = Image::all();
        return view('admin.product.index', [
            'products' => $products,
            'images' => $images,

        ]);

    }

    public function create(): View
    {
        $allcategories = Category::select('id' , 'name')->get();

        return view('admin.product.create',compact('allcategories'));
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

                $fileName = time().".".$file->getClientOriginalExtension();
                $path = $file->storeAs('images',$fileName , 'public');
                $imageUrl = "/storage/" .$path;
                $image[]= $imageUrl;
                
                // $imageName = time();
                // $ext = strtolower($file->getClientOriginalExtension());
                // $imageFullName = $imageName . '.' . $ext;
                // $uploadPath = "images/";
                // $imageUrl = $uploadPath.$imageFullName;
                // $file->move($uploadPath , $imageFullName);
                // $image[]=$imageUrl;
            }
        }

        $paths = implode(',', $image);


        $productRequest = new Product;
        $productRequest->name = $request->name;
        $productRequest->description =$request->description;
        $productRequest->price =$request->price;
        $productRequest->save();
        foreach ($request->category_id as $cat_id){
            Product_category::insert([
                'category_id'=>$cat_id,
                'product_id' =>$productRequest->id
            ]);
        }
        foreach ($image as $image){
            Image::insert([
                'image'=>$image,
                'product_id' =>$productRequest->id
            ]);
        }
        return redirect("admin/product");
     }

//

    public function getProductimage($product_id)
    {
        $images = Image::join('products', 'products.id', '=',
         'images.product_id')->where('images.product_id',
          $product_id)-> select('images.id','images.image','products.name')->get();

         return view('admin.product.showImage', compact('images'));

    }
    public function saveimageProduct(Request $request)
    {
        return $request;
    }

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

    public function edit($id  ): View
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product','images','categories'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $product =  Product::find($request->id);
     
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
    public function search($name){

        return Product::where("name" ,"like","%". $name."%")->get()  ;
    }


    // filter API with category_id

    public function filter($id)
   {
    $categories = Product_category::
        join('categories' , 'categories.id' ,'=','product_categories.category_id')->
        join('products', 'products.id' , '=' ,'product_categories.product_id')->
        select('categories.id as category_id' , 'products.name as product_name')->
        where('categories.id' , $id)->get();

        return $categories;
    }
}