<?php

use App\ObjQuestTwo\Domain\CustomerAggregate\AddressFactory;
use PHPUnit\Framework\TestCase;

class AddressFactoryTest extends TestCase
{
    protected function setUp(): void
    {
    }
       
    /**
     * @testdox Teste se dado um CEP com menos de 8 digitos, uma exceção é lançada.
     */
    public function test_if_address_factory_throw_exception_when_parsed_invalid_zip()
    {   
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('O CEP precisa ter 8 digitos');

        $addressFactory = AddressFactory::createFromBrazil('123', 'Rua A');
    }

    /**
     * @testdox Teste se dado uma rua com 0 digitos, uma exceção é lançada.
     */
    public function test_if_address_factory_throw_exception_when_parsed_invalid_street()
    {   
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('O endereço precisa ter mais de 1 digito');

        $addressFactory = AddressFactory::createFromBrazil('12345678', '');
    }
}
