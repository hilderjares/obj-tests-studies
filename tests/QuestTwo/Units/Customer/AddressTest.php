<?php

use App\ObjQuestTwo\Domain\CustomerAggregate\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    protected function setUp(): void
    {
    }
       
    /**
     * @testdox Teste se o endereço completo é retornado
     */
    public function test_if_full_address_is_valid()
    {   
        $address = new Address('123456789', 'Rua A');

        $fullAddress = $address->__toString();

        $this->assertEquals('Rua A - 123456789', $fullAddress);
    }
}
