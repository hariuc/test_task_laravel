<?php

namespace App\Application\Modules\Currency\Dto\Mapping;

use App\Application\Core\ApiDto;
use App\Application\Core\Interfaces\MappingInterface;
use App\Application\Core\Utils\DateTimeUtils;
use App\Application\Modules\Currency\Models\CurrencyModel;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CurrencyMapping implements MappingInterface
{

    /**
     * @throws Exception
     */
    public function mapToModel(ApiDto $inputModel): Model
    {
        try {
            $date = (new DateTimeUtils())->strDateToDate($inputModel->getDate());
            $model = new CurrencyModel();
            $model->date = $date;
            $model->num_code = strtoupper($inputModel->getNumCode());
            $model->char_code = strtoupper($inputModel->getCharCode());
            $model->nominal = $inputModel->getNominal();
            $model->currency_name = $inputModel->getName();
            $model->currency_value = (float) $inputModel->getValue();

            return $model;
        } catch (Exeption $exception) {
            $errorMessage = $exception->getMessage();
            Log::error(__METHOD__ . " ERROR " . $errorMessage);
            throw new Exception($errorMessage);
        }

    }
}
