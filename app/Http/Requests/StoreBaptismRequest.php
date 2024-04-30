<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBaptismRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'name' => 'required|string|max:250',
            'address' => 'required|string|max:250',
            'mother_name' => 'required|string|max:250',
            'father_name' => 'required|string|max:250',
            'godparent' => 'required|string|max:250',
            'church_name' => 'required|string|max:250',
            'date' => 'required|date',
        ];
    }
}
