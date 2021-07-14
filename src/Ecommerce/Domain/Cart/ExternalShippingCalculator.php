<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Cart;

interface ExternalShippingCalculator
{
    public function getValueToShippingByZipCode(string $zipCode): int;
}
