<?php

namespace App\Http\Requests;

use App\Models\AdmissionsEdp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdmissionsEdpRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admissions_edp_edit');
    }

    public function rules()
    {
        return [
            'admission_status_id' => [
                'required',
                'integer',
            ],
            'edp_title_id' => [
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
            'admission_no' => [
                'string',
                'required',
                'unique:admissions_edps,admission_no,' . request()->route('admissions_edp')->id,
            ],
            'company_sponsored' => [
                'required',
            ],
        ];
    }
}
