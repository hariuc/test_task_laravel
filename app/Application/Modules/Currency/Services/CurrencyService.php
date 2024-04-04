<?php

namespace App\Application\Modules\Currency\Services;

use App\Application\Core\Utils\CurrencyModelUtils;
use App\Application\Modules\Currency\Repositories\CurrencyRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CurrencyService
{
    public function __construct(private readonly CurrencyRepository $repository)
    {
    }

    public function index(Request $request)
    {
        return $this->repository->index($request);
    }

    /**
     * @throws Exception
     */
    public function show(string $id): Model
    {
        try {
            return $this->repository->show($id);
        } catch (Exception $exception) {
            throw new Exception(__METHOD__);
        }
    }

    public function getAllCurrencyFromServer(): void
    {

        $modelArray = $this->repository->getAllCurrencyFromServer();
        //dd($modelArray);
        $currencyModelUtils = new CurrencyModelUtils();
        $searchArrayParams = $currencyModelUtils->getSearchParamArray($modelArray);
        $findCurrencyModels = $this->repository->getCurrencyModels(
            $searchArrayParams["data_arr"],
            $searchArrayParams["num_code_arr"],
            $searchArrayParams["char_code_arr"]
        );

        $arr = $currencyModelUtils->getArrayExistingOnes($modelArray, $findCurrencyModels);
        foreach ($modelArray as $item) {
            if (in_array($item, $arr)) {
                $item->save();
            } else {
                $item->update();
            }
        }

    }
}
