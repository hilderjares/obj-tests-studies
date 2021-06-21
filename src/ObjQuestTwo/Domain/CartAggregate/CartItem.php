<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CartAggregate;

class CartItem
{
    private int $quantity;

    private Product $product;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}
