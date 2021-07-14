<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Cart;

class Money
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function addMoney(float $amount)
    {
        return new self($this->amount + $amount);
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
