<?php

use App\ObjQuestOne\AndSpecification;
use App\ObjQuestOne\MultipleOfFiveSpecification;
use App\ObjQuestOne\MultipleOfSevenSpecification;
use App\ObjQuestOne\MultipleOfThreeSpecification;
use App\ObjQuestOne\OrSpecification;
use App\ObjQuestOne\NotSpecification;
use PHPUnit\Framework\TestCase;

class MultipleSpecificationPatternTest extends TestCase
{
    protected function setUp(): void
    {
        
    }
       
    /**
     * @testdox Teste se dado um número natural ele não é multiplo de 3 ou 5
     */
    public function test_if_the_number_not_is_multiple_of_3_or_5()
    {   
        $multipleOfThreeOrFive = new OrSpecification(
            new NotSpecification(new MultipleOfThreeSpecification()), 
            new NotSpecification(new MultipleOfFiveSpecification())
        );
        
        $this->assertTrue((new NotSpecification(new MultipleOfThreeSpecification()))->isSatisfiedBy(8));

        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(8));
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(5));
    }

    /**
     * @testdox Teste se dado um número natural ele é multiplo de (3 ou 5) e 7
     */
    public function test_if_the_number_is_multiple_of_3_or_5_and_7()
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        $multipleOfThreeOrFiveAndSeven = new AndSpecification($multipleOfThreeOrFive, new MultipleOfSevenSpecification());
        
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(3));
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(5));
        $this->assertTrue($multipleOfThreeOrFiveAndSeven->isSatisfiedBy(35));
        $this->assertTrue($multipleOfThreeOrFiveAndSeven->isSatisfiedBy(21));
    }

    /**
     * @testdox Teste se dado um número natural ele é multiplo de 3 e 5
     */
    public function test_if_the_number_is_multiple_of_3_and_5()
    {   
        $multipleOfThreeAndFive = new AndSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        
        $this->assertTrue($multipleOfThreeAndFive->isSatisfiedBy(15));
    }

    /**
     * @testdox Teste se dado um número natural ele é multiplo de 3 ou 5
     */
    public function test_if_the_number_is_multiple_of_3_or_5()
    {   
        $multipleOfThreeOrFive = new OrSpecification(new MultipleOfThreeSpecification(), new MultipleOfFiveSpecification());
        
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(5));
        $this->assertTrue($multipleOfThreeOrFive->isSatisfiedBy(3));
    }
}
