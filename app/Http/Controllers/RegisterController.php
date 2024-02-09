<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        $admin_data = [
            'name' => 'admin',
            'surname' => 'admin',
            'lastname' => 'admin',
            'login' => 'admin',
            'email' => 'admin',
            'password' => 'admin',
            'role' => 'admin',
        ];
        User::updateOrCreate($admin_data);
        return view('registration');
    }
    public function store(RegistrationRequest $request)
    {
        $all_user = User::all();
        $data = $request->validated();
        foreach ($all_user as $user) {
            if ($data['login'] != $user->login) {
                if ($data['email'] != $user->email) {
                    if ($data['password'] == $data['repeat_password']) {
                        $end_data = [
                            'name' => $data['name'],
                            'surname' => $data['surname'],
                            'lastname' => $data['lastname'],
                            'login' => $data['login'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                            'role' => "client",
                        ];
                        User::create($end_data);
                        session(['isRole' => $user->role, 'idUser' => $user->id]);
                        return redirect()->route('about_us.index');
                    } else {
                        echo "<script type='text/javascript'>alert('Введенные вами пароли не совпадают');</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Введенная вами почта занята');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Введенный вами логин занят');</script>";
            }
        }
    }
}
