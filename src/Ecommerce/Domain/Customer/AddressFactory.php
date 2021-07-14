<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Customer;

use DomainException;

class AddressFactory
{
    private const ZIP_BR_SIZE = 8;
    private const MIN_STREET_SIZE = 1;

    public static function createFromBrazil(string $zipCode, string $street): Address
    {
        if (self::ZIP_BR_SIZE > strlen($zipCode)) {
            throw new DomainException('O CEP precisa ter 8 digitos');
        }

        if (self::MIN_STREET_SIZE > strlen($street)) {
            throw new DomainException('O endereço precisa ter mais de 1 digito');
        }

        return new Address($zipCode, $street);
    }
}
