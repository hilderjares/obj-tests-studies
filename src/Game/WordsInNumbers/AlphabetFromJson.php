<?php

declare(strict_types=1);

namespace App\Game\WordsInNumbers;

use DomainException;

final class AlphabetFromJson implements Alphabet
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function build(): array
    {
        if (!file_exists($this->file)) {
            throw new DomainException('Arquivo não existe');
        }

        $content = file_get_contents($this->file);
        $collection = json_decode($content, true);

        return $collection;
    }
}
