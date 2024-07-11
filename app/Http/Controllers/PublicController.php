<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function welcome(){
        $products = Product::latest()->paginate(12);
        $categories = Category::pluck('title','id')->toArray();


        return view('welcome',compact('products','categories'));
    }

    public function CategoryWiseProducts($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products()->paginate(10);
        $categories = Category::pluck('title','id')->toArray();

        return view('category_wise_product',compact('products','categories'));
    }

    function about ()
     {
        return view ('about');
     }
     function contact ()
     {
        return view ('contact');
     }
     function users ()
     {
       $allUser= User::all();
       //dd($user);
       return view('users',['users'=>$allUser]);
        // return view ('');
     }
}
