<?php

namespace App\Http\Controllers;

use App\Helpers\BuhHelper;
use App\Models\Category;
use App\Models\Product;


class FirstController extends Controller
{
    public function index(){
        $latestProducts = Product::query()
            ->where('status', 1)
            ->limit(10)
            ->latest()
            ->with('category')
            ->get();


        return view('welcome', compact('latestProducts'));
    }

}
