<?php

use App\ObjQuestTwo\Domain\CartAggregate\Money;
use App\ObjQuestTwo\Domain\CartAggregate\Cart;
use App\ObjQuestTwo\Domain\CartAggregate\CartShippingCalculatorService;
use App\ObjQuestTwo\Domain\CartAggregate\Product;
use PHPUnit\Framework\TestCase;

class CartShippingCalculatorTest extends TestCase
{
    protected function setUp(): void
    {
    }

    /**
     * @testdox Teste se adicionando o mesmo produto, uma exceção é lançada
     */
    public function test_shipping_calculator()
    {
        $this->expectException(DomainException::class);
        
        $p1 = new Product(uniqid(), 'Dell latitude', new Money(1500));
        $p2 = new Product(uniqid(), 'Mouse', new Money(80));
        
        $cart = new Cart(3);

        $cart->addProduct($p1, 3);
        $cart->addProduct($p1, 2);
        $cart->addProduct($p2, 3);
    }
}
