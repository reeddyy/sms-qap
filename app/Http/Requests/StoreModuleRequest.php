<?php

namespace App\Http\Requests;

use App\Models\Module;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreModuleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('module_create');
    }

    public function rules()
    {
        return [
            'module_name' => [
                'string',
                'required',
                'unique:modules',
            ],
            'module_abbr' => [
                'string',
                'required',
                'unique:modules',
            ],
            'module_code' => [
                'string',
                'required',
                'unique:modules',
            ],
            'module_status' => [
                'required',
            ],
        ];
    }
}
