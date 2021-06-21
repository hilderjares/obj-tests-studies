<?php

use App\ObjQuestTwo\Domain\CartAggregate\Money;
use App\ObjQuestTwo\Domain\CartAggregate\Cart;
use App\ObjQuestTwo\Domain\CartAggregate\CartCheckoutCalculatorService;
use App\ObjQuestTwo\Domain\CartAggregate\Product;
use PHPUnit\Framework\TestCase;

class CartShippingCalculatorServiceTest extends TestCase
{
    protected function setUp(): void
    {
    }

    /**
     * @testdox Teste o valor total dos produtos.
     */
    public function test_shipping_calculator()
    {
        $p1 = new Product(uniqid(), 'Dell latitude', new Money(100));
        $p2 = new Product(uniqid(), 'Mouse', new Money(50));
        $p3 = new Product(uniqid(), 'Teclado', new Money(20));
        $cart = new Cart(3);
        $cart->addProduct($p1, 1);
        $cart->addProduct($p2, 2);
        $cart->addProduct($p3, 5);

        $calculator = (new CartCheckoutCalculatorService())->calculate($cart->getProducts());
        
        $this->assertTrue($calculator === 300.0);
    }
}
