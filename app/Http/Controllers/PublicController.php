<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
     function users ()
     {
       $allUser= User::all();
       //dd($user);
       return view('users',['users'=>$allUser]);
        // return view ('');
     }
}
