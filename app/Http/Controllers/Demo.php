<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo extends Controller
{
    public function index1(){
        return view('menu');
    }
    public function about($lang=null){
        return view('about');
    }
}
