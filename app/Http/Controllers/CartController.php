<?php

namespace App\Http\Controllers;
use App\Models\CartProduct;
use App\Models\Category;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
        dd($request->all());
    }
}
