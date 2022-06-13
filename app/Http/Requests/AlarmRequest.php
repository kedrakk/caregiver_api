<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlarmRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'alarm_time' => 'required',
            'flag_id' => 'required|integer',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'alarm_time.required' => 'Alarm time is required',
            'flag_id.required' => 'Flag id is required',
            'flag_id.integer' => 'Flag id must be an integer',
        ];
    }
}