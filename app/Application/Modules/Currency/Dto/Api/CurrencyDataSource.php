<?php

namespace App\Application\Modules\Currency\Dto\Api;

use App\Application\Core\AppConstants;
use App\Application\Core\Utils\DateTimeUtils;
use App\Application\Core\Utils\XMLUtils;
use \DateTime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CurrencyDataSource
{
    public function getCurrency(DateTime $value): array
    {
        $dateTimeUtils = new DateTimeUtils();
        $dateStr = $dateTimeUtils->dateTimeToStr($value);
        $path = AppConstants::$baseUrlPath . "official_exchange_rates?date=" . $dateStr;
        $response = Http::get($path);

        if ($response->ok()) {
            $xmlUtils = new XMLUtils();
            return $xmlUtils->parseCurrencyXML($response->body(), $dateStr);
        } else {
            Log::error(__METHOD__ . " ERROR ");
            return [];
        }
    }
}
