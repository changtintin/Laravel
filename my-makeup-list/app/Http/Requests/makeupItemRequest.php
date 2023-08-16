<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class makeupItemRequest extends FormRequest{
    
    /*

        MY NOTE    
        ===================================================================== 
        _ Determine if the user is authorized to make this request.

    */
    public function authorize(){
        return true;
    }

    /*

        MY NOTE    
        ===================================================================== 
        _ Get the validation rules that apply to the request.
     
    */
    public function rules(){
        return [
            'name' => 'required | max:255',
            'type' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'bought' => 'required'
        ];
    }
}
