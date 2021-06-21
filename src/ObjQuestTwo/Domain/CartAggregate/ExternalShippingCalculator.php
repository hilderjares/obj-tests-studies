<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CartAggregate;

interface ExternalShippingCalculator
{
    public function getValueToShippingByZipCode(string $zipCode): float;
}
