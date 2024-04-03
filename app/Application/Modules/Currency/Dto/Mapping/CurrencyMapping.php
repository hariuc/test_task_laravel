<?php

namespace App\Application\Modules\Currency\Dto\Mapping;

use App\Application\Core\ApiDto;
use App\Application\Core\MappingInterface;
use App\Application\Core\Utils\DateTimeUtils;
use App\Application\Modules\Currency\Models\CurrencyModel;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;

class CurrencyMapping implements MappingInterface
{


//    public function mapToDto(Model $inputModel): ApiDto
//    {
//        return new CurrencyApiDto(
//            (string)$inputModel->date,
//            $inputModel->num_code,
//            $inputModel->char_code,
//            $inputModel->nominal,
//            $inputModel->currency_name,
//            (string)$inputModel->currency_value);
//    }

    /**
     * @throws Exception
     */
    public function mapToModel(ApiDto $inputModel): Model
    {
        try {
            $date = (new DateTimeUtils())->strDateToDate($inputModel->getDate());
            $model = new CurrencyModel();
            $model->date = $date;
            $model->num_code = $inputModel->getNumCode();
            $model->charCode = $inputModel->getCharCode();
            $model->nominal = $inputModel->getNominal();
            $model->currency_name = $inputModel->getName();
            $model->currency_value = $inputModel->getValue();

            return $model;
        } catch (Exeption $exception) {
            $errorMessage = $exception->getMessage();
            Log::error(__METHOD__ . " ERROR " . $errorMessage);
            throw new Exception($errorMessage);
        }

    }
}
