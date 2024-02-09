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
        $data = $request->validated();
        $users = User::all();
        $user = $users->where('login' ,$data['login'])->first();
        if($user== null)
        {
            echo "<script type='text/javascript'>alert('Введенный вами пароль или логин неверный');</script>";
            return redirect()->route('login.index');
        }
        else {
            if ($user['password'] == $data['password']) {
                session(['isRole' => $user->role, 'idUser' => $user->id]);
                return redirect()->route('home.index');
            } else {
                echo "<script type='text/javascript'>alert('Введенный вами пароль или логин неверный');</script>";
                return redirect()->route('login.index');
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
