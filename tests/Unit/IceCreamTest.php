<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IceCreamTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $response = $this->json('POST', '/ice-cream/store', ['name' => 'Lazza Ice Cream 2','brand'=>'Lazza','type'=>'cup','price'=>'50.00']);
        $response
            ->assertStatus(302);
    }
}
