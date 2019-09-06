<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['username'];

    public function rules()
    {
        return [
            'username'=>'required',
            'thum'=>'required|image',
        ];
    }

    public function messages()
    {
        return[
            "required"=>"必須項目です。",
            "image"=>"指定されたファイルが画像（jpg,png,bmp,gif,svg）ではありません。",
        ];
    }
}
