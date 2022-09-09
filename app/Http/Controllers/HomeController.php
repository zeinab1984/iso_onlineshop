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
        return view('front.index',compact('categories'));

    }

    public function show(Category $category)
    {
        $categories = Category::showCategory();

        $products = Product::query()
            ->where('category_id','=',$category->id)->get();
//        dd($products);

        return view('front.categories.show',compact('products','categories','category'));

    }
}
