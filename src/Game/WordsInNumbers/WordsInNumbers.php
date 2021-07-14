<?php

declare(strict_types=1);

namespace App\Game\WordsInNumbers;

use App\Game\GameService;

final class WordsInNumbers
{
    private GameService $service;

    private Alphabet $alphabet;

    public function __construct(GameService $gameService, Alphabet $alphabet)
    {
        $this->service = $gameService;
        $this->alphabet = $alphabet;
    }

    public function play($word)
    {
        $collection = $this->alphabet->build();

        $total = array_reduce(str_split($word), function ($carry, $letter) use ($collection) {
            return $carry += $collection[$letter];
        }, 0);

        return $this->service->play($total);
    }
}
