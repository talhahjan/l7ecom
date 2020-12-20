<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Product;
use App\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sections = Section::all();
        $featured=Product::where('featured', 1)
        ->orderBy('title')
        ->take(10)
        ->get();


        return view('home', compact('sections','featured'));
    }
}
