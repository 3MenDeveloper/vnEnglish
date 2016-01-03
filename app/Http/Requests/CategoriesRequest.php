<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoriesRequest extends Request
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,bmp,png',
            'exp'   => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Xin vui lòng nhập tên kĩ năng',
            'image.image'    => 'File tải lên phải là hình ảnh.',
            'image.mimes'    => 'File tải lên phải là định dạng: jpeg, bmp, png',
            'exp.integer'    => 'Điểm kinh nghiệm phải là số',
            'exp.required'   => 'Điểm kinh nghiệm không được để trống'
        ];
    }
}
