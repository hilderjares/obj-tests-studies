<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CartAggregate;

use Iterator;

class CartCheckoutCalculatorService
{
    public function calculate(Iterator $items): float
    {
        $total = 0.0;

        foreach ($items as $item) {
            $product = $item->getProduct()->getValue();
            $quantity = $item->getQuantity();

            $subTotal = $product * $quantity;
            $total += $subTotal;
        }

        return $total;
    }
}
