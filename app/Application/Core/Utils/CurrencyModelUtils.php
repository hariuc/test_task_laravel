<?php

namespace App\Application\Core\Utils;

class CurrencyModelUtils
{

    public function getSearchParamArray(array $models): array
    {
        return [
            "data_arr" => $this->getDateArray($models),
            "num_code_arr" => $this->getNumCodeArray($models),
            "char_code_arr" => $this->getCharCodeArray($models),
        ];
    }

    public function getArrayExistingOnes(array $models, array $findCurrencyModels): array
    {
        if (count($findCurrencyModels) === 0){
            return $models;
        }else{
            return array_map(function ($item) use ($models){
                return in_array($item, $models) ? $item : null;
            }, $findCurrencyModels);
        }
    }

    private
    function getNumCodeArray(array $models): array
    {
        return array_map(function ($item) {
            return trim($item->num_code);
        }, $models);
    }

    private
    function getCharCodeArray(array $models): array
    {
        return array_map(function ($item) {
            return trim($item->char_code);
        }, $models);
    }

    private
    function getDateArray(array $models): array
    {
        return array_map(function ($item) {
            return $item->date;
        }, $models);
    }
}
