<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;

use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

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
     * Feature testing for Save User value.
     *
     * @return void
     */
    public function testSaveUserValue(): void
    {
        $response  = $this->json('POST', 'api/save', ['value' => 30]);
        $response->assertJson(['save' => true]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for retrieving User value
     *
     * @return void
     */
    public function testRetrieveUserValue(): void
    {
        $response  = $this->json('GET', 'api/savedValue');
        $response->assertJson(['value' => null]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing for Clearing User value
     *
     * @return void
     */
    public function testClearUserValue(): void
    {
        $response  = $this->json('POST', 'api/clear');
        $response->assertJson(['value' => null]);
        $this->assertResponse($response);
    }

    /**
     * Feature testing when no value is given
     *
     * @return void
     */
    public function testNoUserValueGiven(): void
    {
        $response  = $this->json('POST', 'api/save');
        $response->assertSee('Value is required');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing when given value is not numeric
     *
     * @return void
     */
    public function testUserValueIsNotNumeric(): void
    {
        $response  = $this->json('POST', 'api/save', ['value' => 'abc']);
        $response->assertSee('Value must be an integer');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing when given value is not integer
     *
     * @return void
     */
    public function testUserValueIsNotInteger(): void
    {
        $response  = $this->json('POST', 'api/save', ['value' => '12.34']);
        $response->assertSee('Value must be an integer');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing when value is less than -2147483648
     *
     * @return void
     */
    public function testUserValueIsVerySmall(): void
    {
        $response  = $this->json('POST', 'api/save', ['value' => '-2147483649']);
        $response->assertSee('value must be greater than or equal -2147483648');
        $this->assertEquals(422, $response->status());
    }

    /**
     * Feature testing when user value is greater than 2147483647
     *
     * @return void
     */
    public function testUserValueIsVeryLarge(): void
    {
        $response  = $this->json('POST', 'api/save', ['value' => '2147483648']);
        $response->assertSee('value must be less than or equal 2147483647');
        $this->assertEquals(422, $response->status());
    }
}
