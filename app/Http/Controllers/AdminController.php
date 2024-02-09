<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\AdminRequest;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin');
    }
    public function show_panel_add_product()
    {
        $categories = Category::all();
        return view('add_product', compact('categories'));
    }
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $file = Storage::disk('public')->put("img", request()->image);
        $data['image'] = asset("storage/".$file);
        Products::create($data);
        return redirect()->route('about_us.index');
    }
    public function show_list()
    {
        $products = Products::all();
        return view('catalog', compact('products'));
        // Изменить так, что если $__Sesion = 1(то еть админ, тогда перекидывает в каталог и там появляются кнопки
        // удалить и редактировать рядорм с кнопкой заказать)
        // Надо сделать после регистрации входа
    }
}
