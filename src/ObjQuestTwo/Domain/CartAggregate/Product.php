<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CartAggregate;

use App\ObjQuestTwo\Domain\CartAggregate\Money;

class Product
{
    private string $identify;

    private string $name;

    private Money $value;

    public function __construct(string $identify, string $name, Money $value)
    {
        $this->identify = $identify;
        $this->name = $name;
        $this->value = $value;
    }

    public function getIdentify(): string
    {
        return $this->identify;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): float
    {
        return $this->value->getAmount();
    }
}
