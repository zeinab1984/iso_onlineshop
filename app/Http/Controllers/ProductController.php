<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::showProduct();
        return view('dashboard.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::showCategory();
        return view('dashboard.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,File $file)
    {





        $product = new Product();
        $product->name = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->save();



//            dd($attribute);
            $i = 0;
            while(isset($request->key[$i])) {
                $attribute = new Attribute();
                $attribute->product_id = $product->id;

                $attribute->key = $request->key[$i];
                $attribute->value = $request->value[$i];
                $attribute->save();
                $i++;
            }

        if($request->hasFile('image')){

            $pic = $request->file('image');
            $path = 'products';
            $fileName = time().'_'.$pic->getClientOriginalName();
            $pic->storeAs($path,$fileName);

            $file = new File([
                'name'=> $fileName,
                'file_path'=> 'products'.'/'.$fileName,
                ]);
            $product->pic()->save($file);
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $categories = Category::showCategory();
        if(filled($product->pic)){
            $image_path = $product->pic->file_path;
//            dd( $image_path);
        }else{
            $image_path = "<p>عکسی برای محصول پیدا نشد!</p>";
        }

//        dd($image_path);
        return view('dashboard.products.edit',compact('product','categories','image_path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
//        dd($product);
        $product->name = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->save();

        if(filled($product->pic)){
              storage::delete($product->pic->file_path.'/'.$product->pic->name);
              $product->pic()->delete();
        }
        if($request->hasFile('image')){

            $pic = $request->file('image');
            $path = 'products';
            $fileName = time().'_'.$pic->getClientOriginalName();
            $pic->storeAs($path,$fileName);

            $file = new File([
                'name'=> $fileName,
                'file_path'=> $path.'/'.$fileName,
                ]);
            $product->pic()->save($file);
        }


        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->pic()->delete();
        $product->featuers()->delete();
        $product->delete();
        return redirect()->route('products.index');
    }
}
