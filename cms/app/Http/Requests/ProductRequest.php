<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
   public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'txtname'=>'required',
           'txtprice'=>'required',
           'txtimage'=>'required',
        ];
    }
    public function messages()
    {
        return [
           'txtname.required'=>'Bạn phải nhập trường tên',
           'txtprice.required'=>'Bạn phải nhập trường giá',
           'txtimage.required'=>'Bạn phải nhập trường ảnh',
           'txtimage.image'=>'Đây không phải là file ảnh',
        ];
    }
}
