<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function show()
    {
        $products = Products::all();
        return view('about_us', compact('products'));
    }
}
