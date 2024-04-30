<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarriageRequest extends FormRequest
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
            //add all fields from marriage models
            'user_id'=>'required|string',
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



        ];
    }
}
