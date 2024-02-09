<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\AdminRequest;
use App\Http\Requests\Post\ChangeRequest;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function show()
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            return view('admin');
        }

    }
    public function show_panel_add_product()
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        $categories = Category::all();
        return view('add_product', compact('categories'));
    }
    public function store(AdminRequest $request)
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            $data = $request->validated();
            $file = Storage::disk('public')->put("img", request()->image);
            $data['image'] = asset("storage/".$file);
            Products::create($data);
            return redirect()->route('about_us.index');
        }

    }
    public function show_list()
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            $products = Products::all();
            return view('catalog', compact('products'));
            // Изменить так, что если $__Sesion = 1(то еть админ, тогда перекидывает в каталог и там появляются кнопки
            // удалить и редактировать рядорм с кнопкой заказать)
            // Надо сделать после регистрации входа
        }

    }
    public function delete($id_product)
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            $products = Products::find($id_product)->delete();
            $products = Products::all();
            return view('catalog', compact('products'));
        }
    }
    public function edit($id_product)
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            $products = Products::find($id_product);
            $categories = Category::all();
            return view('edit_product', compact('products', 'categories'));
        }
    }
    public function change(ChangeRequest $request)
    {
        if(session('isRole')!='admin')
        {
            abort(404);
        }
        else{
            $data = $request->validated();
            $file = Storage::disk('public')->put("img", request()->image);
            $data['image'] = asset("storage/".$file);
            Products::all()->find($data['id'])->update($data);
            return redirect()->route('catalog.index');
        }
    }
}
