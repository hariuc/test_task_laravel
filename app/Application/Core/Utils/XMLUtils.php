<?php

namespace App\Application\Core\Utils;

use App\Application\Modules\Currency\Dto\Api\CurrencyApiDto;
use Illuminate\Support\Facades\Log;
use \SimpleXMLElement;

class XMLUtils
{
    public function parseCurrencyXML(string $content, string $date): array
    {
        $xmlData = simplexml_load_string($content);
        if ($xmlData instanceof SimpleXMLElement) {
            $currencyApiDtoArray = [];
            foreach ($xmlData->children() as $currency) {
                $currencyApiDto = new CurrencyApiDto(
                    $date,
                    (string)$currency->NumCode,
                    (string)$currency->CharCode,
                    (string)$currency->Nominal,
                    (string)$currency->Name,
                    (string)$currency->Value
                );
                $currencyApiDtoArray[] = $currencyApiDto;
            }
            return $currencyApiDtoArray;
        } else {
            Log::error(__METHOD__ . " ERROR ");
            return [];
        }
    }
}
