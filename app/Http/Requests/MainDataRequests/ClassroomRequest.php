<?php

namespace App\Http\Requests\MainDataRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassroomRequest extends FormRequest
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
// /(\p{Arabic})/u
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this::isMethod('patch'))
        return [

            'Name_en' => 'required|regex:/^([a-zA-Z0-9])/u',
            'Name_ar' => ['required',
                'regex:/(\p{Arabic})|[0-9]/u'],
            'Notes_en' => 'required_with:Notes_ar|regex:/^([a-zA-Z0-9])/u',
            'Notes_ar' => ['required_with:Notes_en','regex:/(\p{Arabic})|[0-9]/u'],
            'grade' => 'exists:Grades,id',

        ];
        else
            return [
                'list_classroom.*.Name_en' => 'required|regex:/^([a-zA-Z0-9])/u',
                'list_classroom.*.Name_ar' => ['required',
                    'regex:/(\p{Arabic})|[0-9]/u'],
                'list_classroom.*.Notes_en' => 'required_with:list_classroom.*.Notes_ar|regex:/^([a-zA-Z0-9])/u',
                'list_classroom.*.Notes_ar' => ['required_with:list_classroom.*.Notes_en','regex:/(\p{Arabic})|[0-9]/u'],
                'list_classroom.*.grade' => 'exists:Grades,id',
            ];
    }
    public function messages()
    {
        return [
            'list_classroom.*.Name_en.required' => 'Name in english is required',
            'list_classroom.*.Name_ar.required' => 'Name in arabic  is required',
        ];
    }
}
