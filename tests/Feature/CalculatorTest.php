<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class CalculatorTest extends TestCase
{

    /**
     *  Util function for asserting response values
     *
     * @param TestResponse $response
     *
     * @return void
     */
    private function assertResponse(TestResponse $response): void
    {
        $response->assertSuccessful();
        $this->assertEquals(200, $response->status());
    }

    /**
     * Feature testing for add.
     *
     * @return void
     */
    public function testAdd()
    {
        $response  = $this->json('POST', 'api/add', ['num1' => 30, 'num2' => 20]);
        $response->assertJson(['answer' => 50]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for Subtraction.
     *
     * @return void
     */
    public function testSubtract()
    {
        $response  = $this->json('POST', 'api/subtract', ['num1' => 30, 'num2' => 20]);
        $response->assertJson(['answer' => 10]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for Multiplication.
     *
     * @return void
     */
    public function testMultiply()
    {
        $response  = $this->json('POST', 'api/multiply', ['num1' => 30, 'num2' => 20]);
        $response->assertJson(['answer' => 600]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for Division.
     *
     * @return void
     */
    public function testDivision()
    {
        $response  = $this->json('POST', 'api/divide', ['num1' => 30, 'num2' => 20]);
        $response->assertJson(['answer' => 1.5]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for SquareRoot.
     *
     * @return void
     */
    public function testSquareRoot()
    {
        $response  = $this->json('POST', 'api/squareRoot', ['num1' => 36]);
        $response->assertJson(['answer' => 6]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for Division by Zero.
     *
     * @return void
     */
    public function testDivisionByZero()
    {
        $response  = $this->json('POST', 'api/divide', ['num1' => 30, 'num2' => 0]);
        $response->assertJson(['error' => 'Division by zero']);
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing when no input provided
     *
     * @return void
     */
    public function testNoInputSent()
    {
        $response  = $this->json('POST', 'api/divide');
        $response->assertSee('Num1 is required');
        $response->assertSee('Num2 is required');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing for num1 is not a number
     *
     * @return void
     */
    public function testNum1IsNotNumeric()
    {
        $response  = $this->json('POST', 'api/divide', ['num1' => '2A', 'num2' => '5']);
        $response->assertSee('Num1 must be number only');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing for num2 is not a number
     *
     * @return void
     */
    public function testNum2IsNotNumeric()
    {
        $response  = $this->json('POST', 'api/divide', ['num1' => '20', 'num2' => '5B']);
        $response->assertSee('Num2 must be number only');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing for inputs are not number.
     *
     * @return void
     */
    public function testNum1AndNum2AreNotNumeric()
    {
        $response  = $this->json('POST', 'api/divide', ['num1' => '20A', 'num2' => '5B']);
        $response->assertSee('Num1 must be number only');
        $response->assertSee('Num2 must be number only');
        $this->assertEquals(422, $response->status());
    }
}
