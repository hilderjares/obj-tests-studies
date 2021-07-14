<?php

declare(strict_types=1);

namespace App\Ecommerce\Infra;

use App\Ecommerce\Domain\Cart\ExternalShippingCalculator;

class CorreiosShippingCalculator implements ExternalShippingCalculator
{
    public function getValueToShippingByZipCode(string $zipCode): int
    {
        $mock = [
            '99999999' => 99,
            '88888888' => 88,
            '11111111' => 11,
        ];

        return $mock[$zipCode] ?? 0;
    }
}
