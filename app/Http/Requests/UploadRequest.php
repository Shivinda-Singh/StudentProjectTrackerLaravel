<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
        $rules =  [
            'name'=>'required',
            'description' => 'required',
            'course_code' => 'required',
            'year_completed' => 'required',
            'github' => 'required',
            
        ];

        $files = count($this->input('files'));
        foreach(range(0, $files) as $index) {
            $rules['files.' . $index] = 'max:100000';
        }

        return $rules;
    }
}
