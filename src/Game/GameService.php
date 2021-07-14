<?php

declare(strict_types=1);

namespace App\Game;

interface GameService
{
    /**
     * @param int|string $number
     * @return bool
     */
    public function play($number): bool;
}
