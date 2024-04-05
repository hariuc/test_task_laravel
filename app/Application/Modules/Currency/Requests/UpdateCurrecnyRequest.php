<?php

namespace App\Application\Modules\Currency\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrecnyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "date" => "required|date",
            "num_code" => "required|string|size:3",
            "char_code" => "required|string|size:3",
            "nominal" => "required|string|max:3",
            "currency_name" => "required|string|max:50",
            "currency_value" => "required|numeric",
        ];
    }
}
