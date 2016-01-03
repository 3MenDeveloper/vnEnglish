<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionsRequest extends Request
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
        $rules = [
            'ask' => 'required',
            'rightAnswer' => 'array',
            // 'option.0' => 'image|mimes:jpeg,png',
        ];

        // Option
        $numFile = count(Request::file('option'));
        if($numFile > 0)
            $options = Request::file('option');
        else
            $options = $this->request->get('option');

        if ($options) {
            foreach ($options as $key => $value) {
                $rules['option.'.$key] = 'required';
                if($numFile > 0)
                    $rules['option.'.$key] = 'required|image|mimes:jpeg,png';
            }
        }

        return $rules;
    }

    public function messages()
    {

        $messages = [
            'ask.required' => 'Xin vui lòng nhập tiêu đề câu hỏi',
        ];
        // foreach($this->request->get('option') as $key => $val) {
        //     $messages['option.'.$key.'.required'] = 'Tùy chọn đáp án '.$key.' bắt buộc nhập.';
        // }

        return $messages;

    }
}
