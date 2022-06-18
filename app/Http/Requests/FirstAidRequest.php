<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstAidRequest extends FormRequest
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
            'name' => 'required|string|max:500',
            'instruction' => 'required|string|max:1000',
            'caution' => 'required|string|max:1000',
            'photo' => 'required|string',
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
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 500 characters',
            'instruction.required' => 'Instruction is required',
            'instruction.string' => 'Instruction must be a string',
            'instruction.max' => 'Instruction must be less than 1000 characters',
            'caution.required' => 'Caution is required',
            'caution.string' => 'Caution must be a string',
            'caution.max' => 'Caution must be less than 1000 characters',
            'photo.image' => 'Photo must be an image',
            'photo.mimes' => 'Photo must be a valid image',
            'photo.max' => 'Photo must be less than 2048 kilobytes',
        ];
    }
}