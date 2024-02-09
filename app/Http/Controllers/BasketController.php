<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show()
    {
        if(session('isRole')=='')
        {
            abort(404);
        }
        else{
            $products = Products::all();
            $collection = Cart::all()
                ->where('user_id',session('idUser'));
            return view('basket', compact('collection','products'));

        }
    }
    public function show_basket(Request $request,$id_product)
    {
        if(session('isRole')=='')
        {
            abort(404);
        }
        $end_data = [
            'user_id' => $request->session()->get('idUser'),
            'product_id' => $id_product,
            'quantity' => 1,
        ];
        Cart::create($end_data);
        $products = Products::all();
        $collection = Cart::all()
            ->where('user_id',session('idUser'));
        return view('basket', compact('collection','products'));
    }

}
