<?php

namespace App\Application\Modules\Currency\Repositories;

use App\Application\Modules\Currency\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    private function getAllCurrency(Request $request)
    {
        $query = CurrencyModel::query();

        $query->orderBy("date", direction: "asc");
        return $query->paginate((integer)env("PAGINATE_NUMBER"));
    }
}
