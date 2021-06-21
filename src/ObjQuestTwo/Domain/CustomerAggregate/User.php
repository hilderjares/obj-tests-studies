<?php

declare(strict_types=1);

namespace App\ObjQuestTwo\Domain\CustomerAggregate;

class User
{
    private string $identify;
    
    private string $name;

    private Address $address;

    public function __construct(string $indentify, string $name, Address $address)
    {
        $this->identify = $indentify;
        $this->name = $name;
        $this->address = $address;
    }

    public function getIdentify(): string
    {
        return $this->identify;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
