<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function showProduct (Product $product)
    {

    }
}
