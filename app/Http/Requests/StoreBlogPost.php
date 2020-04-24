<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'brand_name' => 'required|unique:brand|max:20',
            'brand_url' => 'required',
            'goods_name' => 'required|unique:brand|max:20',
            //
        ];
    }
    // 错误信息提示
    public function messages()
    {
        return [
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.max'=>'品牌名称不得超过20位',
            'brand_url.required'=>'品牌网址必填',
            //
        ];
    }
}
