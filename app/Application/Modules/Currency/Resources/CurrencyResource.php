<?php

namespace App\Application\Modules\Currency\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "date" => $this->date,
            "num_code" => $this->num_code,
            "char_code" => $this->char_code,
            "nominal" => $this->nominal,
            'currency_name' => $this->currency_name,
            "currency_value" => $this->currency_value,
        ];
    }
}
