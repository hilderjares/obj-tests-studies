<?php

declare(strict_types=1);

namespace App\Ecommerce\Domain\Customer;

class User
{
    private string $id;
    
    private string $name;

    private Address $address;

    public function __construct(string $id, string $name, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function getId(): string
    {
        return $this->id;
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
