<?php

namespace App\Http\Requests\Sites;

use Illuminate\Foundation\Http\FormRequest;

class SiteCreateRequest extends FormRequest
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
            'hosts' => ['nullable'],
            'username' => ['nullable'],
            'password' => ['nullable'],
            'port' => ['nullable'],
            'base_dn' => ['nullable'],
            'timeout' => ['nullable'],
            'use_ssl' => ['nullable'],
            'use_tls' => ['nullable'],
        ];
    }
}
