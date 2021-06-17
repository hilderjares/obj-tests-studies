<?php

use App\ObjQuestOne\AndSpecification;
use App\ObjQuestOne\MultipleOfFiveEspecification;
use App\ObjQuestOne\MultipleOfSevenEspecification;
use App\ObjQuestOne\MultipleOfThreeEspecification;
use App\ObjQuestOne\OrSpecification;
use PHPUnit\Framework\TestCase;

class MultipleEspecificationPatternTest extends TestCase
{
    protected function setUp(): void
    {
        
    }
       
    /**
     * @testdox Teste se dado um número natural ele é multiplo de (3 ou 5) e 7
     * @covers
     */
    public function test_if_the_number_is_multiple_of_3_or_5_and_7()
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        $multipleOfThreeOrFiveAndSeven = new AndSpecification($multipleOfThreeOrFive, new MultipleOfSevenEspecification());
        
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(3));
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(5));
        $this->assertTrue($multipleOfThreeOrFiveAndSeven->isSatisfiedBy(35));
        $this->assertTrue($multipleOfThreeOrFiveAndSeven->isSatisfiedBy(21));
    }

    /**
     * @testdox Teste se dado um número natural ele é multiplo de 3 e 5
     * @covers
     */
    public function test_if_the_number_is_multiple_of_3_and_5()
    {   
        $multipleOfThreeAndFive = new AndSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        
        $this->assertTrue($multipleOfThreeAndFive->isSatisfiedBy(15));
    }

    /**
     * @testdox Teste se dado um número natural ele é multiplo de 3 ou 5
     * @covers
     */
    public function test_if_the_number_is_multiple_of_3_or_5()
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeEspecification(), new MultipleOfFiveEspecification());
        
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(5));
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(3));
    }
}
