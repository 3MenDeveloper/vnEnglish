<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuizsRequest extends Request
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
            'title'    => 'required|max:255',
            'image'    => 'image',
            'password' => 'min:4',
            'duration' => 'integer',
            'active'   => 'boolean',
            'skillID'  => 'integer'

        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'Xin vui lòng nhập tên trắc nghiệm',
            'title.max'        => 'Trắc Nghiệm tối đa 255 kí tự',
            'image.image'      => 'File tải lên phải là hình ảnh.',
            'password.min'     => 'Mật khẩu tối thiểu 4 kí tự',
            'duration.integer' => 'Phải là số nguyên dương không âm',
            'active.boolean'   => 'Ẩn hiện phải là giá trị 1,0 hoặc true, false',
            'skillID.integer'  => 'Phải là số nguyên dương không âm'
        ];
    }
}
