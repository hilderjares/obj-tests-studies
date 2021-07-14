<?php

declare(strict_types=1);

namespace Tests\Ecommerce\Domain\Units\Cart;

use App\Ecommerce\Domain\Cart\Money;
use App\Ecommerce\Domain\Cart\Cart;
use App\Ecommerce\Domain\Cart\CheckoutCalculateService;
use App\Ecommerce\Domain\Cart\Product;
use App\Ecommerce\Domain\Customer\Address;
use App\Ecommerce\Infra\CorreiosShippingCalculator;
use PHPUnit\Framework\TestCase;

class CartShippingCalculatorServiceTest extends TestCase
{
    /**
     * @testdox Teste o valor total dos produtos.
     * @dataProvider cartProvider
     */
    public function test_shipping_calculator(Cart $cart)
    {
        $service = new CheckoutCalculateService();

        $mockCorreios = $this->createMock(CorreiosShippingCalculator::class);
        $mockCorreios->method('getValueToShippingByZipCode')
            ->with('99999999')
            ->willReturn(99)
        ;

        $checkoutTotal = $service->exec($mockCorreios, $cart->getItems(), new Address('99999999', 'Rua A'));
        
        $this->assertEquals(200.0, $checkoutTotal);
    }

    public function cartProvider(): array
    {
        $dell = new Product(uniqid(), 'Dell latitude', new Money(100));
        $mouse = new Product(uniqid(), 'Mouse', new Money(50));

        $cart = new Cart();
        $cart->addProduct($dell, 1);
        $cart->addProduct($mouse, 2);

        return [
            'Cart' => [$cart],
        ];
    }
}
