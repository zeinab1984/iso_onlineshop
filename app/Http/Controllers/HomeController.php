<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{

    public function index()
    {

        $categories = Category::showCategory();
        $products = Product::showProduct();
        return view('front.products.show_all',compact('categories','products'));

    }

    public function showCategory(Category $category)
    {
        $categories = Category::showCategory();

        $products = Product::query()
            ->where('category_id','=',$category->id)->get();
//        dd($products);

        return view('front.categories.show',compact('products','categories','category'));

    }


    public function Cart ()
    {
        return view('front.cart.cart');
    }



    public function addToCart(Product $product)
    {
        $categories = Category::showCategory();
        $product = Product::findOrFail($product->id);
        $cart = session('cart', []);
//        dd($cart);
        if(filled($product->pic)) {
            $image = $product->pic->file_path;
        }else{
            $image = null;
        }
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $image,
                'created_at'=> now(),
                'update_at'=>now()
            ];
        }

        session(['cart'=>$cart]);
//        dd(session('cart'));

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request,Product $product)
    {
//        dd($request->quantity);
        if($request->product->id && $request->quantity)
        {
            $cart = session('cart');
            $cart[$request->product->id]["quantity"] = $request->quantity;
            $cart[$request->product->id]["update_at"] = now();
            session(['cart'=>$cart]);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->route('cart.show');
    }


    public function destroy(Request $request,Product $product)
    {

        if($request->product->id) {
            $cart = session('cart');
            if(isset($cart[$request->product->id])) {
                unset($cart[$request->product->id]);
                session(['cart'=> $cart]);
            }
            session()->flash('success', 'محصول با موفقیت حذف شد');
        }
        return redirect()->route('cart.show');
    }

}
