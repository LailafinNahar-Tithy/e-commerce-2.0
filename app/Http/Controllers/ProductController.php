<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
         return view ('admin.pages.products.index');
        //dd('product list dekhabe');
    }

    public function create(){
        return view ('admin.pages.products.create');

   }
}
