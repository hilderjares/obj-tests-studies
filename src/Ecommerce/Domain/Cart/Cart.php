<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Cart;

use DomainException;
use Illuminate\Support\Collection;

class Cart
{
    private Collection $items;

    private string $userId;

    private const MIN_PRODUCT_QUANTITY = 1;

    public function __construct()
    {
        $this->items = new Collection();
    }

    public function addUser(string $userId): void
    {
        $this->userId = $userId;
    }

    public function addProduct(Product $product, int $quantity): void
    {
        if (self::MIN_PRODUCT_QUANTITY > $quantity) {
            throw new DomainException('A quantidade de produtos precisa ser maior que 1');
        }

        $newItem = new CartItem($product, $quantity);

        if ($this->items->offsetExists($product->getId())) {
            throw new DomainException('O produto já foi adicionado');
        }

        $this->items->offsetSet($product->getId(), $newItem);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
