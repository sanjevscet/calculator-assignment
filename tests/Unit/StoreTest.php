<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Services\StoreService;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test to store value.
     *
     * @return void
     */
    public function testCanStoreValue()
    {
        $service  = new StoreService();
        $value = 10;
        $response = $service->save($value);
        $this->assertEquals(true, $response);
        $this->assertTrue(true);
    }


   /**
     * A basic unit test to retrieve value.
     *
     * @return void
     */
    public function testCanRetrieveValue()
    {
        $service  = new StoreService();
        $response = $service->retrieve();
        $this->assertEquals(null, $response); // since, no actual value is stored in DB, so checking against null value
        $this->assertTrue(true);
    }

   /**
     * A basic unit test to retrieve value.
     *
     * @return void
     */
    public function testCanClearValue()
    {
        $service  = new StoreService();
        $response = $service->clear();
        $this->assertEquals(null, $response);
        $this->assertTrue(true);
    }
}
