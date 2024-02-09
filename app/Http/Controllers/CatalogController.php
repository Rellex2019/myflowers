<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show()
    {
        $products = Products::all();
        return view('catalog', compact('products'));
    }
    public function show_one($id_product)
    {
        $product = Products::find($id_product);
        return view('one_product', compact('product'));
    }
}
