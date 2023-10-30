<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => ['string', 'max:20', 'required'],
            'second_name' => ['string', 'max:20', 'required'],
            'email' => ['email', 'required'],
            'phone' => ['string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required'],
            'note' => ['string', 'nullable'],
            'company_id' => ['integer', 'required'],
        ];
    }
}
