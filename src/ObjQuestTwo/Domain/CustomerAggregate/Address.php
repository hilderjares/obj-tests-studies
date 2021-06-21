<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CustomerAggregate;

class Address
{
    private string $zipCode;

    private string $street;

    public function __construct(string $zipCode, string $street)
    {
        $this->zipCode = $zipCode;
        $this->street = $street;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function __toString()
    {
        return sprintf("%s - %s", $this->street, $this->zipCode);
    }
}
