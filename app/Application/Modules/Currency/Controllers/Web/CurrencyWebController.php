<?php

namespace App\Application\Modules\Currency\Controllers\Web;

use App\Application\Core\AppConstants;
use App\Application\Core\Traits\Currency\CurrencyViewModelTrait;
use App\Application\Modules\Currency\Requests\CurrencyGetRequest;
use App\Application\Modules\Currency\Services\CurrencyService;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;


class CurrencyWebController extends Controller
{
    use CurrencyViewModelTrait;
    public function __construct(readonly CurrencyService $service)
    {

    }

    public function index(CurrencyGetRequest $request): View
    {
        $validatedData = $request->validated();
        $params = [
            "title" => AppConstants::TITLE,
            "currency_data" => $this->service->index($request, $validatedData),
            "is_auth" => auth()->check(),
        ];
        return view("layouts.currencies.currency", $params);
    }


    public function show(string $id): View
    {
        $currencyEditModel = $this->getCurrencyViewModelEdit($this->service->show($id));
        //dd($currencyEditModel);
        $params = [
            "title" => "Currency " . $currencyEditModel->getName(),
            "model_data" => $currencyEditModel,
        ];
        return view("layouts.currencies.currency_show", $params);
    }

    public function edit(Request $request, string $id): View|RedirectResponse
    {

        if ($request->isMethod("POST"))
        {
            return redirect()->route("currency.list");
        }else
        {
            $currencyEditModel = $this->getCurrencyViewModelEdit($this->service->show($id));
            $params = [
                "title" => "Currency " . $currencyEditModel->getName(),
                "model_data" => $currencyEditModel,

            ];
            return view("layouts.currencies.currency_edit", $params);
        }


    }
}
