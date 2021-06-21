<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CartAggregate;

use ArrayObject;
use DomainException;
use Iterator;

class Cart
{
    private ArrayObject $items;

    private string $userIdentify;

    private const MIN_PRODUCT_QUANTITY = 1;

    public function __construct(string $userIdentify)
    {
        $this->products = new ArrayObject();
        $this->userIdentify = $userIdentify;
    }

    public function addProduct(Product $product, int $quantity): void
    {
        if ($quantity < self::MIN_PRODUCT_QUANTITY) {
            throw new DomainException('A quantidade de produtos precisa ser maior que 1');
        }

        $newItem = new CartItem($product, $quantity);

        if ($this->products->offsetExists($product->getIdentify())) {
            throw new DomainException('O produto já foi adicionado');
        }

        $this->products->offsetSet($product->getIdentify(), $newItem);
    }

    public function getProducts(): Iterator
    {
        return $this->products->getIterator();
    }

    public function getUserIdentify(): string
    {
        return $this->userIdentify;
    }
}
