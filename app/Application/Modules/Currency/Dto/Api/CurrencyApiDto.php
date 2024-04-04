<?php

namespace App\Application\Modules\Currency\Dto\Api;

use App\Application\Core\ApiDto;

class CurrencyApiDto extends ApiDto
{

    public function __construct(
        readonly private string $date,
        readonly private string $numCode,
        readonly private string $charCode,
        readonly private string $nominal,
        readonly private string $name,
        readonly private string $value)
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

    public function copyWith(?string $date, ?string $numCode, ?string $charCode, ?string $nominal, ?string $name, ?string $value): self
    {
        return new self(
            $date === null ? $this->date : $date,
            $numCode === null ? $this->numCode : $numCode,
            $charCode === null ? $this->charCode : $charCode,
            $nominal === null ? $this->nominal : $nominal,
            $name === null ? $this->name : $name,
            $value === null ? $this->value : $value
        );
    }
}
