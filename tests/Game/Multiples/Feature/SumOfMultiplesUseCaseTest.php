<?php

declare(strict_types=1);

namespace Tests\Game\Multiples\Feature;

use App\Game\Multiples\Specification\AndSpecification;
use App\Game\Multiples\Specification\OrSpecification;
use App\Game\Multiples\MultipleOfFiveSpecification;
use App\Game\Multiples\MultipleOfSevenSpecification;
use App\Game\Multiples\MultipleOfThreeSpecification;
use App\Game\Multiples\SumOfMultiplesUseCase;
use PHPUnit\Framework\TestCase;

class SumOfMultiplesUseCaseTest extends TestCase
{
    /**
     * @testdox Teste somar todos os multiplos de 3 ou 5 abaixo de 10
     */
    public function test_sum_all_multiples_of_3_or_5_less_than_10(): void
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeOrFive);

        $result = $useCase->execute(9);

        $this->assertTrue(23 === $result);
    }

    /**
     * @testdox Teste somar todos os multiplos de 3 e 5 abaixo de 50
     */
    public function test_sum_all_multiples_of_3_and_5_less_than_50(): void
    {   
        $multipleOfThreeAndFive = new AndSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeAndFive);

        $result = $useCase->execute(50);

        $this->assertTrue(90 === $result);
    }

    /**
     * @testdox Teste somar todos os multiplos de (3 ou 5) e 7 abaixo de 50
     */
    public function test_sum_all_multiples_of_3_or_5_and_7_less_than_50(): void
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        $multipleOfThreeOrFiveAndSeven = new AndSpecification($multipleOfThreeOrFive, new MultipleOfSevenSpecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeOrFiveAndSeven);

        $resultOne = $useCase->execute(21);
        $resultTwo = $useCase->execute(35);

        $this->assertTrue(21 === $resultOne);
        $this->assertTrue((35 + 21) === $resultTwo);
    }
}
