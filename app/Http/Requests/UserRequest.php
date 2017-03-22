<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        //Cek apakah CREATE/UPDATE
       if($this->method()  == 'PATCH'){
            $email_rules     = 'required|email|max:100|unique:users,email,'.$this->get('id'); //teliti kurung atau kurung kotak
            $password_rules  = 'sometimes|confirmed|min:6';
        }
        else{
            $email_rules     = 'required|email|max:100|unique:users';
            $password_rules  = 'required|confirmed|min:6';
        }

        return [
            'name'     =>'required|max:255', //harus sama semua dengan tabel DB jika tidak , tidak dapat save data                       
            'email'     => $email_rules,
            'password'  => $password_rules,
            'level'     =>'required|in:admin,operator',         
            'fotoa'     => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
