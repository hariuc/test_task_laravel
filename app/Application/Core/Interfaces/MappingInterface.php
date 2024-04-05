<?php

namespace App\Application\Core\Interfaces;

use App\Application\Core\ApiDto;
use Illuminate\Database\Eloquent\Model;

interface MappingInterface
{
    public function mapToModel(ApiDto $inputModel): Model;
}
