<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show()
    {
        $products = Products::all();
        return view('basket', compact('products'));
    }
}
