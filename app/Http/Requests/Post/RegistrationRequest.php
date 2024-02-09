<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'lastname' => 'required|string',
            'login' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'repeat_password' => 'required|string',
        ];
    }
}
