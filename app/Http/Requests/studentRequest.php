<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentRequest extends FormRequest
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
            'username' => 'required|min:3',
            'password' => 'required',
           // 'name' => 'required',
           // 'dept' => 'required',
            'type' => 'required'
          //  'cgpa' => 'required',
           // 'email' => 'required|email:rfc,dns',
           //'username' => 'unique:users,email_address'    // configure something unique at first the model name then check the cloumn of the table 
           // 'phone' => 'required|digits:11'|starts_with:01 , // to check if the value is within 11 numbers
        ];
    }

    public function messages(){
        return [
            'username.required'=> "can't left empty....",
            'password.required'=> "can't left empty....",
            'type.required'=> "can't left empty....",
            'username.min'=> "minimum 3 characters...."
           // 'name.required'=> "can't left empty...."
        ];
    }
}
