<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
     function about ()
     {
        return view ('about');
     }
     function contact ()
     {
        return view ('contact');
     }
}
