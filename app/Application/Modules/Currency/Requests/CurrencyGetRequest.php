<?php

namespace App\Application\Modules\Currency\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
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
            "date" => "date",
            "num_code" => "string|size:3",
            "char_code" => "string|size:3",
        ];
    }
}
