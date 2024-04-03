<?php

namespace App\Application\Modules\Currency\Repositories;

use App\Application\Modules\Currency\Dto\Api\CurrencyDataSource;
use App\Application\Modules\Currency\Dto\Mapping\CurrencyMapping;
use App\Application\Modules\Currency\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DateTime;

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

    public function getAllCurrencyFromServer(): array
    {
        $currencyDataSource = new CurrencyDataSource();
        $currencyDtoArray = $currencyDataSource->getCurrency(new DateTime());
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
