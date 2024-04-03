<?php

namespace App\Application\Core\Utils;

use DateTime;
use Exception;
use Illuminate\Support\Facades\Log;

class DateTimeUtils
{
    /**
     * @throws Exception
     */
    public function strDateToDate(string $strDate): DateTime
    {
        try {
            return new DateTime($strDate);
        } catch (Exception $exception) {
            $errorMessage = $exception->getMessage();
            Log::error(__METHOD__ . " ERROR " . $errorMessage);
            throw new Exception($errorMessage);
        }
    }

    public function dateTimeToStr(DateTime $value): string{
        return $value->format("d.m.Y");
    }
}
