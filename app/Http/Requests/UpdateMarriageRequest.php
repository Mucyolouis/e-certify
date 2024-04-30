<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarriageRequest extends FormRequest
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
            //
            'bride_first_name' => 'required|string',
            'bride_last_name' => 'required|string',
            'groom_first_name' => 'required|string',
            'groom_last_name' => 'required|string',
            'god_mother_name' => 'required|string',
            'god_father_name' => 'required|string',
            'telephone' => 'required|string',
            'address' => 'required|string',
            'clergy_name' => 'required|string',
            'church_name' => 'required|string',
            'date' => 'required|date',
            // 'is_approved' => 'required|boolean',

        ];
    }
}
