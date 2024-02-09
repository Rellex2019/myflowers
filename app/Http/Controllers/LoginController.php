<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function enter(LoginRequest $request)
    {
        $all_users = User::all();
        $data = $request->validated();
        foreach ($all_users as $user) {
            if ($data['login'] == $user->login && $data['password'] == $user->password) {
                session(['isRole' => $user->role, 'idUser'=>$user->id]);
                return redirect()->route('home.index');
            } else {
                echo "<script type='text/javascript'>alert('Введенный вами пароль или логин неверный');</script>";
            }
        }
    }
    public function exit(Request $request)
    {
        if (session('isRole')!='')
        {
            $request->session()->forget('isRole');
            $request->session()->forget('idUser');
            return redirect()->route('home.index');
        }
    }
}
