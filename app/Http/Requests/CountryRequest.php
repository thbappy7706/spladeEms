<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CountryRequest extends FormRequest
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
        if (Request::isMethod('post')) {
            return [
                'country_code' => ['required', 'string', 'max:3'],
                'name' => ['required', 'string', 'max:100']

            ];
        } else {
            return [
                'country_code' => ['required', 'string', 'max:3'],
                'name' => ['required', 'string', 'max:100']
            ];
        }
    }
}
