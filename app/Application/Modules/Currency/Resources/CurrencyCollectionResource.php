<?php

namespace App\Application\Modules\Currency\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyCollectionResource extends JsonResource
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
            'currency_name' => $this->currency_name,
            "currency_value" => $this->currency_value,
        ];
    }
}
