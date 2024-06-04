<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
         $products= Product::all();
         return view ('admin.pages.products.index',compact('products'));
        //dd('product list dekhabe');
    }

    public function create(){
        return view ('admin.pages.products.create');

   }
}
