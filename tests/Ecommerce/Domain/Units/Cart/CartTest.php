<?php

declare(strict_types=1);

namespace Tests\Ecommerce\Domain\Units\Cart;

use App\Ecommerce\Domain\Cart\Money;
use App\Ecommerce\Domain\Cart\Cart;
use App\Ecommerce\Domain\Cart\Product;
use DomainException;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * @testdox Teste se adicionando o mesmo produto, uma exceção é lançada
     */
    public function test_if_throw_exception_when_add_the_same_product()
    {
        $this->expectException(DomainException::class);
        
        $dell = new Product(uniqid(), 'Dell latitude', new Money(1500));

        $cart = new Cart();

        $cart->addProduct($dell, 3);
        $cart->addProduct($dell, 3);
    }

    /**
     * @testdox Teste se adicionando -1 produtos, uma exceção é lançada
     */
    public function test_if_throw_exception_when_add_invalid_quantity_products()
    {
        $this->expectException(DomainException::class);
        
        $dell = new Product(uniqid(), 'Dell latitude', new Money(1500));
        
        $cart = new Cart();

        $cart->addProduct($dell, -1);
    }
}
