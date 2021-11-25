<?php

namespace App\Http\Requests;

use App\Models\Grade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGradeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grade_edit');
    }

    public function rules()
    {
        return [
            'grade_letter' => [
                'string',
                'required',
                'unique:grades,grade_letter,' . request()->route('grade')->id,
            ],
            'grade_description' => [
                'string',
                'nullable',
            ],
            'grade_point_s' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grade_marks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
