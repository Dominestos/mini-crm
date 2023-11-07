<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $company = $this->route('company');
        return [
            'name' => ['max:20', 'required'],
            'email' => [
                'email',
                'required',
                Rule::unique('companies')->ignore($company->id),
            ],
            'phone' => [
                'string',
                'regex:/^\+?\d{1,3}[-\s]?\d{5,10}$/',
                'required',
                Rule::unique('companies')->ignore($company->id),
            ],
            'website' => [
                'url:http,https',
                'required',
                Rule::unique('companies')->ignore($company->id),
            ],
            'logo' => ['image', 'nullable'],
            'note' => ['string', 'nullable'],
        ];
    }
}
