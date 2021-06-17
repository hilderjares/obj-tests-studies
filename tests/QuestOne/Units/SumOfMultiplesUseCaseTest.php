<?php

use App\ObjQuestOne\AndSpecification;
use App\ObjQuestOne\MultipleOfFiveEspecification;
use App\ObjQuestOne\MultipleOfSevenEspecification;
use App\ObjQuestOne\MultipleOfThreeEspecification;
use App\ObjQuestOne\OrSpecification;
use App\ObjQuestOne\SumOfMultiplesUseCase;
use PHPUnit\Framework\TestCase;

class SumOfMultiplesUseCaseTest extends TestCase
{
    protected function setUp(): void
    {
    }
    
    /**
     * @testdox Teste somar todos os multiplos de 3 ou 5 abaixo de 10
     * @covers
     */
    public function test_sum_all_multiples_of_3_or_5_less_than_10(): void
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeOrFive);

        $result = $useCase->execute(9);

        $this->assertTrue(23 === $result);
    }

    /**
     * @testdox Teste somar todos os multiplos de 3 e 5 abaixo de 50
     * @covers
     */
    public function test_sum_all_multiples_of_3_and_5_less_than_50(): void
    {   
        $multipleOfThreeAndFive = new AndSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeAndFive);

        $result = $useCase->execute(50);

        $this->assertTrue(90 === $result);
    }

    /**
     * @testdox Teste somar todos os multiplos de (3 ou 5) e 7 abaixo de 50
     * @covers
     */
    public function test_sum_all_multiples_of_3_or_5_and_7_less_than_50(): void
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        $multipleOfThreeOrFiveAndSeven = new AndSpecification($multipleOfThreeOrFive, new MultipleOfSevenEspecification());
        $useCase = new SumOfMultiplesUseCase($multipleOfThreeOrFiveAndSeven);

        $resultOne = $useCase->execute(21);
        $resultTwo = $useCase->execute(35);

        $this->assertTrue(21 === $resultOne);
        $this->assertTrue((35 + 21) === $resultTwo);
    }
}
