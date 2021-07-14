<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Cart;

use App\Ecommerce\Domain\Customer\Address;
use Illuminate\Support\Collection;

class CheckoutCalculateService
{
    private const MINIMUM_MONEY_TO_FREE_SHIP = 100;

    public function exec(ExternalShippingCalculator $shipService, Collection $items, Address $address): float
    {
        $total = $items->reduce(function (int $accumulator, CartItem $item) {
            $product = $item->getProduct()->getValue();
            $quantity = $item->getQuantity();

            $accumulator += ($product * $quantity);

            return $accumulator;
        }, 0);

        if (self::MINIMUM_MONEY_TO_FREE_SHIP > $total) {
            $external = $shipService->getValueToShippingByZipCode($address->getZipCode());
            $total += $external;
        }

        return $total;
    }
}
