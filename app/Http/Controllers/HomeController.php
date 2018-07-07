<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;

class HomeController extends Controller
{
   

    public function index()
    {
        $sliders = Slider::all();
        $items=Item::all();
        $categorys=Category::all();
        return view('index.index',['sliders'=>$sliders,'categorys'=>$categorys,'items'=>$items]);
    }
}
