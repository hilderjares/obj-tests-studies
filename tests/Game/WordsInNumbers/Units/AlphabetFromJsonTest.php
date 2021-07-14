<?php

declare(strict_types=1);

namespace Tests\Game\WordsInNumbers\Units;

use DomainException;
use App\Game\WordsInNumbers\AlphabetFromJson;
use PHPUnit\Framework\TestCase;

class AlphabetFromJsonTest extends TestCase
{
    /**
     * @testdox Teste se dado um alfabeto em json, é convertido em um array associativo
     */
    public function test_can_build_alphabet_collection()
    {
        $alphabet = new AlphabetFromJson(__DIR__ . '/../../../resources/alphabet.json');

        $collection = $alphabet->build();

        $this->assertIsArray($collection);
        $this->assertArrayHasKey("a", $collection);
        $this->assertArrayHasKey("Z", $collection);
    }

    /**
     * @testdox Teste se uma execão é laça ao passar um arquivo que não existe
     */
    public function test_throw_exception_when_not_file_exists()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Arquivo não existe');

        $alphabet = new AlphabetFromJson(__DIR__ . '/../../../resources/not_found.json');

        $collection = $alphabet->build();
    }
}
