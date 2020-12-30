<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminRequest extends FormRequest
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
            'username' => 'required|min:3|unique:admins',
            'username' => 'required|min:3|unique:freelancer',
            'username' => 'required|min:3|unique:buyer',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required|email:rfc',
            'phone' => 'required|digits:11|starts_with:01' , // to check if the value is within 11 numbers
            'member' => 'required',
           'address' => 'required'
            
           //'username' => 'unique:users,email_address',    // configure something unique at first the model name then check the cloumn of the table 
           // 'phone' => 'required|digits:11'|starts_with:01 , // to check if the value is within 11 numbers
        ];
    }

    public function messages(){
        return [
            'username.required'=> "username can't be left empty....",
            'username.min'=> "username minimum 3 characters....",
            'username.unique'=> "username already taken, change you username....",
            'password.required'=> "password can't be left empty....",
            'name.required'=> "name can't be left empty....",
            'email.required'=> "email can't be left empty....",
            'email.email'=> "email incorrect.",
            'phone.required'=> "phone no can't be left empty....",
            'phone.digits'=> "phone no must have 11 digits",
            'phone.starts_with'=> "phone no must start with 01....",
            'address.required'=> "address can't be left empty....",
            'member.required'=> "member can't be left empty....",
           // 'name.required'=> "can't left empty...."
        ];
    }
}
