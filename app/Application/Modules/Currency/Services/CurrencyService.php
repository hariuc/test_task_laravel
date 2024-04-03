<?php

namespace App\Application\Modules\Currency\Services;

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
        //return $this->repository->index($request);
        return $this->getAllCurrencyFromServer();
    }

    /**
     * @throws Exception
     */
    public function show(string $id): Model
    {
        try {
            return $this->repository->show($id);
        }catch (Exception $exception){
            throw new Exception(__METHOD__);
        }
    }

    public function getAllCurrencyFromServer():void
    {
        $modelArray = $this->repository->getAllCurrencyFromServer();
    }
}
