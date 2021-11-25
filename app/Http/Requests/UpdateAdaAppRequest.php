<?php

namespace App\Http\Requests;

use App\Models\AdaApp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdaAppRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ada_app_edit');
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
            'application_no' => [
                'string',
                'required',
                'unique:ada_apps,application_no,' . request()->route('ada_app')->id,
            ],
            'award_name' => [
                'string',
                'nullable',
            ],
            'hear_about_us' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'id_no' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nationality' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'postal_code' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'contact_no' => [
                'string',
                'nullable',
            ],
            'company_name_1' => [
                'string',
                'nullable',
            ],
            'designation_1' => [
                'string',
                'nullable',
            ],
            'duration_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'country_1' => [
                'string',
                'nullable',
            ],
            'company_name_2' => [
                'string',
                'nullable',
            ],
            'designation_2' => [
                'string',
                'nullable',
            ],
            'duration_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'country_2' => [
                'string',
                'nullable',
            ],
            'company_name_3' => [
                'string',
                'nullable',
            ],
            'designation_3' => [
                'string',
                'nullable',
            ],
            'duration_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'country_3' => [
                'string',
                'nullable',
            ],
            'programme_1' => [
                'string',
                'nullable',
            ],
            'certificate_no_1' => [
                'string',
                'nullable',
            ],
            'date_awarded_1' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'certificate_1' => [
                'string',
                'nullable',
            ],
            'programme_2' => [
                'string',
                'nullable',
            ],
            'certificate_no_2' => [
                'string',
                'nullable',
            ],
            'date_awarded_2' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'certificate_2' => [
                'string',
                'nullable',
            ],
            'programme_3' => [
                'string',
                'nullable',
            ],
            'certificate_no_3' => [
                'string',
                'nullable',
            ],
            'date_awarded_3' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'certificate_3' => [
                'string',
                'nullable',
            ],
        ];
    }
}
