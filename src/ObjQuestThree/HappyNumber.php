<?php

declare(strict_types=1);

namespace App\ObjQuestThree;

class HappyNumber
{   
    private function play(int $number): bool
    {   
        $occuredNumbers = [];

        while($number !== 1 && !in_array($number, $occuredNumbers)) {
            $occuredNumbers[] = $number;

            $numberSquared = array_map(fn ($number) => pow($number, 2), str_split((string) $number));
            $number = array_reduce($numberSquared, fn ($carray, $number) => $carray += $number, 0);
        }

        return $number === 1;
    }

    public function isHappy(int $number): bool
    {   
        return $this->play($number);
    }
}