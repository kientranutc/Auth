<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username'=> 'required|unique:users|max:255',
            'email'=> 'required|unique:users|max:255',
            'password'=>'required|max:16|min:6',
            'confirm_password'=> 'required|same:password',
            'role' =>'required|not_in:-1',
            'fullname' => 'required|max:255'
        ];
    }
}
