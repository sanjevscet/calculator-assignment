<?php

namespace Tests\Unit;

use App\Services\CalculatorService;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    /**
     * Util function to return the instance of Calculator Service
     *
     * @return CalculatorService
     */
    private function getCalculatorService(): CalculatorService
    {
        return new CalculatorService;
    }

    /**
     * Unit test for addition
     *
     * @return void
     */

    public function testAddition(): void
    {
        $answer = $this->getCalculatorService()->add(8, 6);
        $this->assertEquals(14, $answer);
        $this->assertTrue(true);
    }

    /**
     * Unit test for Subtraction
     *
     * @return void
     */
    public function testSubtraction(): void
    {
        $answer = $this->getCalculatorService()->subtract(8, 6);
        $this->assertEquals(2, $answer);
        $this->assertTrue(true);
    }

    /**
     * Unit test for Multiplication
     *
     * @return void
     */
    public function testMultiplication(): void
    {
        $answer = $this->getCalculatorService()->multiply(8, 6);
        $this->assertEquals(48, $answer);
        $this->assertTrue(true);
    }

    /**
     * Unit test for Division
     *
     * @return void
     */
    public function testDivision(): void
    {
        $answer = $this->getCalculatorService()->divide(24, 6);
        $this->assertEquals(4, $answer);
        $this->assertTrue(true);
    }

    /**
     * Unit test for SquareRoot
     *
     * @return void
     */
    public function testSqrt(): void
    {
        $answer = $this->getCalculatorService()->squareRoot(9);
        $this->assertEquals(3, $answer);
        $this->assertTrue(true);
    }
}
