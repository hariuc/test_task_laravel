<?php

namespace App\Application\Modules\Currency\Repositories;

use App\Application\Core\Utils\DateTimeUtils;
use App\Application\Modules\Currency\Dto\Api\CurrencyDataSource;
use App\Application\Modules\Currency\Dto\Mapping\CurrencyMapping;
use App\Application\Modules\Currency\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Date;

class CurrencyRepository
{
    public function index(Request $request)
    {
        return $this->getAllCurrency($request);
    }

    public function show(string $id): Model
    {
        return CurrencyModel::query()->where("id", "=", $id)->firstOrFail();
    }

//    public function getCurrencyModelEqual(?DateTime $dateTime, ?string $numCode, ?string $charCode): Collection
//    {
//        $query = CurrencyModel::query();
//        if (isset($dateTime)) {
//            $dateTimeUtils = new DateTimeUtils();
//            $query->where("date", "=", $dateTimeUtils->dateTimeToStr($dateTime));
//        }
//
//        if (isset($numCode)) {
//            $query->where("num_code", "=", trim($numCode));
//        }
//
//        if (isset($charCode)) {
//            $query->where("char_code", "=", trim($charCode));
//        }
//
//        return $query->get();
//    }

    public function getCurrencyModels(array $dateTimes, array $numCodes, array $charCodes): array
    {
        $query = CurrencyModel::query();
        if (count($dateTimes) > 0) {
            $dateTimeUtils = new DateTimeUtils();
            $query->whereIn("date", array_map(function ($item) use ($dateTimeUtils) {
                return $dateTimeUtils->dateTimeToStr($item, "Y-m-d");
            }, $dateTimes));
        }

        if (count($numCodes) > 0) {
            $query->whereIn("num_code", array_map(function ($item) {
                return trim($item);
            }, $numCodes));
        }

        if (count($charCodes) > 0) {
            $query->whereIn("char_code", array_map(function ($item) {
                return trim($item);
            }, $charCodes));
        }
        //dd($query->toSql());
        return $query->get()->toArray();
    }

    public function getAllCurrencyFromServer(): array
    {
        $currencyDataSource = new CurrencyDataSource();
        $date = new DateTime("2024-03-31");
        $currencyDtoArray = $currencyDataSource->getCurrency($date);
        //dd($currencyDtoArray);
        $mapping = new CurrencyMapping();
        return array_map(function ($value) use ($mapping) {
            return $mapping->mapToModel($value);
        }, $currencyDtoArray);
    }

    private function getAllCurrency(Request $request)
    {
        $query = CurrencyModel::query();

        $query->orderBy("date", direction: "asc");
        return $query->paginate((integer)env("PAGINATE_NUMBER"));
    }
}
