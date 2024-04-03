<?php

namespace App\Application\Modules\Currency\Dto\Api;

use App\Application\Core\ApiDto;

class CurrencyApiDto extends ApiDto
{

    public function __construct(
                                private string $date,
                                private string $numCode,
                                private string $charCode,
                                private string $nominal,
                                private string $name,
                                private string $value)
    {

    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getNumCode(): string
    {
        return $this->numCode;
    }

    public function getCharCode(): string
    {
        return $this->charCode;
    }

    public function getNominal(): string
    {
        return $this->nominal;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
