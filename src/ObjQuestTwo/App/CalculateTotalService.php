<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\App;

use App\ObjQuestTwo\Domain\CartAggregate\CartCheckoutCalculatorService;
use App\ObjQuestTwo\Domain\CartAggregate\ExternalShippingCalculator;
use App\ObjQuestTwo\Domain\CustomerAggregate\Address;
use Iterator;

class CalculateTotalService
{
    private CartCheckoutCalculatorService $cartShippingCalculator;
    
    private ExternalShippingCalculator $externalShippingCalculator;

    public function __construct(CartCheckoutCalculatorService $cartShippingCalculator, ExternalShippingCalculator $externalShippingCalculator)
    {
        $this->cartShippingCalculator = $cartShippingCalculator;
        $this->externalShippingCalculator = $externalShippingCalculator;
    }

    public function calculateTotal(Iterator $products, Address $address): float
    {
        $total = $this->cartShippingCalculator->calculate($products);

        if ($total < 100) {
            $external = $this->externalShippingCalculator->getValueToShippingByZipCode($address->getZipCode());
            $total += $external;
        }

        return $total;
    }
}
