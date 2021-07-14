<?php

declare(strict_types=1);

namespace Tests\Game\Multiples\Feature;

use App\Game\Multiples\Specification\AndSpecification;
use App\Game\Multiples\Specification\OrSpecification;
use App\Game\Multiples\Specification\NotSpecification;
use App\Game\Multiples\MultipleOfFiveSpecification;
use App\Game\Multiples\MultipleOfSevenSpecification;
use App\Game\Multiples\MultipleOfThreeSpecification;
use PHPUnit\Framework\TestCase;

class MultipleSpecificationPatternTest extends TestCase
{
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
