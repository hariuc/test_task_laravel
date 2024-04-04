<?php

namespace App\Application\Modules\Currency\Dto\Api;

use App\Application\Core\AppConstants;
use App\Application\Core\Utils\DateTimeUtils;
use App\Application\Core\Utils\RestFullApi;
use App\Application\Core\Utils\XMLUtils;
use \DateTime;
use Illuminate\Support\Facades\Log;

class CurrencyDataSource
{
    public function getCurrency(DateTime $value): array
    {
        $dateTimeUtils = new DateTimeUtils();
        $dateStr = $dateTimeUtils->dateTimeToStr($value);
        $path = AppConstants::BASE_URL_PATH . "official_exchange_rates?date=" . $dateStr;
        $restFullApi = new RestFullApi();
        $response = $restFullApi->get($path);
        if ($response->ok()) {
            //dd($response->body());
            $xmlUtils = new XMLUtils();
            return $xmlUtils->parseCurrencyXML($response->body(), $dateStr);
        } else {
            Log::error(__METHOD__ . " ERROR ");
            return [];
        }
    }
}
