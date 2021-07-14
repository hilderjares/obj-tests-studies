<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Cart;

class Product
{
    private string $id;

    private string $name;

    private Money $value;

    public function __construct(string $id, string $name, Money $value)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }

    public function getId(): string
    {
        return $this->id;
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
