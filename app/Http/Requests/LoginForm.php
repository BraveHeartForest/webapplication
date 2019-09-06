<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ユーザーにこのリクエストを行う権限があるかどうかを判断します。
     * @return bool
     */
    public function authorize()
    {
        if($this->path()=='login')
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     * リクエストに適用される検証ルールを取得します。
     * @return array
     */
    public function rules()
    {
        return [
                'emp_name'=>'required',
                'emp_pass'=>'required',
        ];
    }

    public function messages()
    {
        //オーバーライドです。
        return [
            'emp_name.required'=>'名前が入力されていません',
            'emp_pass.required'=>'パスワードが入力されていません。',
        ];
    }
}
