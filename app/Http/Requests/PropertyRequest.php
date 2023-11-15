<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'area' => 'required',
            'price' => 'required',
            'description' => 'required',
            'room' => 'required',
            'stage' => 'required',
            'postal' => 'required',
            'address' => 'required',
            'city' => 'required',
            'options' => ['required','array','exists:options,id']
        ];
    }
}