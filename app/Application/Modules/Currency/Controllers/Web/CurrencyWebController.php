<?php

namespace App\Application\Modules\Currency\Controllers\Web;

use App\Application\Core\AppConstants;
use App\Application\Modules\Currency\Requests\CurrencyGetRequest;
use App\Application\Modules\Currency\Services\CurrencyService;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Illuminate\View\View;


class CurrencyWebController extends Controller
{
    public function __construct(readonly CurrencyService $service)
    {

    }

    public function index(CurrencyGetRequest $request): View
    {
        $validatedData = $request->validated();
        $params = [
            "title" => AppConstants::TITLE,
            "currency_data" => $this->service->index($request, $validatedData),
        ];
        return view("currency", $params);
    }


    public function show(string $id): View
    {
        $modelData = $this->service->show($id);
        //dd($modelData);
        $params = [
            "title" => "Currency " . $modelData->currency_name,
            "model_data" => $modelData,
        ];
        return view("currency_show", $params);
    }
}
