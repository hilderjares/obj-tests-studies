<?php

declare(strict_types=1);

namespace App\Game\HappyNumber;

use App\Game\GameService;

final class HappyNumber implements GameService
{
    public function play($number): bool
    {
        return $this->isHappy((int) $number);
    }

    private function isHappy(int $number): bool
    {
        $occurredNumbers = [];

        while (1 !== $number && !in_array($number, $occurredNumbers, true)) {
            $occurredNumbers[] = $number;

            $numberSquared = array_map(fn ($number) => pow($number, 2), str_split((string) $number));
            $number = array_reduce($numberSquared, fn ($carry, $number) => $carry += $number, 0);
        }

        return (1 === $number);
    }
}
