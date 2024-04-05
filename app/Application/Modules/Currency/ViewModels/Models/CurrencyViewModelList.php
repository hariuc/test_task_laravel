<?php

namespace App\Application\Modules\Currency\ViewModels\Models;

use App\Application\Core\ViewModel;
use DateTime;

class CurrencyViewModelList extends ViewModel
{
    public function __construct(
        readonly private string $id,
        readonly private DateTime $date,
        readonly private string $numCode,
        readonly private string $charCode,
        readonly private string $nominal,
        readonly private string $name,
        readonly private float $value)
    {}

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getId(): string
    {
        return $this->id;
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

    public function getValue(): float
    {
        return $this->value;
    }

}
