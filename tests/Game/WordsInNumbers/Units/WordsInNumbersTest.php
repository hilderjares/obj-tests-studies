<?php

declare(strict_types=1);

namespace Tests\Game\WordsInNumbers\Units;

use App\Game\HappyNumber\HappyNumber;
use App\Game\Prime\Prime;
use App\Game\WordsInNumbers\AlphabetFromJson;
use App\Game\WordsInNumbers\WordsInNumbers;
use PHPUnit\Framework\TestCase;

class WordsInNumbersTest extends TestCase
{
    private AlphabetFromJson $alphabet;

    protected function setUp(): void
    {
        $this->alphabet = new AlphabetFromJson(__DIR__ . '/../../../resources/alphabet.json');
    }

    /**
     * @testdox Teste se a palavra é primo
     */
    public function test_if_the_word_is_prime()
    {
        $wordsInNumbers = new WordsInNumbers(new Prime(), $this->alphabet);

        $isPrime = $wordsInNumbers->play('ab');

        $this->assertTrue($isPrime);
    }

    /**
     * @testdox Teste se a palavra é feliz
     */
    public function test_if_the_word_is_happy()
    {
        $wordsInNumbers = new WordsInNumbers(new HappyNumber(), $this->alphabet);

        $isPrime = $wordsInNumbers->play('cd');

        $this->assertTrue($isPrime);
    }
}
