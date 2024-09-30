<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisteRequest extends FormRequest
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
            "name"              => ['required', 'max:225'],
            "cpf"               => ['required', 'max:14'],
            "dateOfBirth"       => ['required', 'max:10'],
            "sex"               => ['required', 'max:1'],
            "cep"               => ['required', 'max:9'],
            "address"           => ['required', 'max:225'],
            "number"            => ['required'],
            "state"             => ['required'],
            "city"              => ['required'],
            "representative"    => ['required']
        ];
    }
}
