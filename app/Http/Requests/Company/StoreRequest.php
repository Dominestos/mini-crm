<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['max:20', 'required'],
            'email' => ['email', 'required', 'unique:App\Models\Company'],
            'phone' => ['string', 'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/', 'required', 'unique:App\Models\Company'],
            'website' => ['url:http,https', 'required', 'unique:App\Models\Company'],
            'logo' => ['image', 'nullable'],
            'note' => ['string', 'nullable'],
        ];
    }
}
