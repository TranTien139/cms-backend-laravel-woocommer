<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
{
   public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'txtname'=>'required',
        ];
    }
    public function messages()
    {
        return [
           'txtname.required'=>'Bạn phải nhập trường tên'
        ];
    }
}
