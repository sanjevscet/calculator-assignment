<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /**
     * Unit test for addition
     *
     * @return void
     */
    public function testAddition(): void
    {
        $calculatorService = new \App\Http\Services\CalculatorService;
        $answer = $calculatorService->add(8, 6);
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
        $calculatorService = new \App\Http\Services\CalculatorService;
        $answer = $calculatorService->subtract(8, 6);
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
        $calculatorService = new \App\Http\Services\CalculatorService;
        $answer = $calculatorService->multiply(8, 6);
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
        $calculatorService = new \App\Http\Services\CalculatorService;
        $answer = $calculatorService->divide(24, 6);
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
        $calculatorService = new \App\Http\Services\CalculatorService;
        $answer = $calculatorService->squareRoot(9);
        $this->assertEquals(3, $answer);
        $this->assertTrue(true);
    }
}
