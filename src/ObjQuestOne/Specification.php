<?php 

declare(strict_types=1);

namespace App\ObjQuestOne;

interface Specification
{
    public function isSatisfiedBy(int $number): bool;
}