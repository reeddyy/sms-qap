<?php

namespace App\Http\Requests;

use App\Models\EnrolmentsQualification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEnrolmentsQualificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enrolments_qualification_edit');
    }

    public function rules()
    {
        return [
            'statuses.*' => [
                'integer',
            ],
            'statuses' => [
                'array',
            ],
            'application_no_id' => [
                'required',
                'integer',
            ],
            'course_title_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'classes.*' => [
                'integer',
            ],
            'classes' => [
                'array',
            ],
            'enrolment_no' => [
                'string',
                'required',
                'unique:enrolments_qualifications,enrolment_no,' . request()->route('enrolments_qualification')->id,
            ],
            'student_name_id' => [
                'required',
                'integer',
            ],
            'company_sponsored' => [
                'required',
            ],
            'due_date_1' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_date_2' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'due_date_3' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
