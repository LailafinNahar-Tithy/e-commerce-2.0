<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
         //$products= Product::all();
         $products = Product::paginate(10);
         return view ('admin.pages.products.index',compact('products'));
        //dd('product list dekhabe');
    }

    public function create(){
        return view ('admin.pages.products.create');

   }
   public function store(Request $request){

    $validated = $request->validate([
        'title' => 'required|min:150',
        'price'=>'required',
        'description'=>'required'

    ]);
         dd($request->all());

}
}
