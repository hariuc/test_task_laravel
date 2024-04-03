<?php

namespace App\Application\Core;

use Illuminate\Database\Eloquent\Model;

interface MappingInterface
{
    //public function mapToDto(Model $inputModel): ApiDto;

    public function mapToModel(ApiDto $inputModel): Model;
}
