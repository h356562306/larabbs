<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        return [
            //
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,'.Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>"用户名不能为空",
            'name.between'=>"用户名必须介于3-25个字符之间",
            'name.regex'=>"用户名只支持英文、数字、横杠、下划线",
            'name.unique'=>"用户名已经被占用，请重新填写",
            'avatar.mimes'=>"上传的图片类型必须是：jpeg,bmp,png,gif",
            'avatar.dimensions'=>"图片清晰度不够，请上传高度和宽度都大于208px"
        ];
    }
}
