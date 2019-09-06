<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploaderRequest extends FormRequest
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
            'username'=>'required',
            'thum'=>'required|image|max:1024|', //dimensions:max_width=300,ratio=1/1
        ];
    }

    public function messages()
    {
        return[
            'username.required'=>'名前を入力してください。',
            'thum.required'=>'必須項目です。',
            'thum.image'=>'指定されたファイルが画像（jpg,png,bmp,gif,svg）ではありません。',
            'thum.max'=>'1Mを超えています。',
            //'dimensions'=>'画像の比率は1:1で横幅は最大300pxです。',
            //'required'=>'必須項目です。'でどちらもメッセージの上書きが出来た。
            //名前だけ入力した場合になぜかエラーメッセージが表示されずリダイレクトされる。
        ];
    }
}
