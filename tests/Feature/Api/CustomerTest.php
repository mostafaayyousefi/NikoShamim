<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    public function can_get_all_customers()
	{
		// Create Property so that the response returns it.
		$customers = Customer::factory()->create();
		$response = $this->getJson(route('api.customers.index'));
		// We will only assert that the response returns a 200 status for now.
		$response->assertOk();
        // $response->assertStatus(200);
	}


public function customer_can_be_searched_given_a_query()
{
    Customer::factory()->create([
        'Firstname' => 'Ali'
    ]);
    Customer::factory()->create([
        'Firstname' => 'hasan'
    ]);
    Customer::factory()->create([
        'Firstname' => 'Jamshid'
    ]);

    $this->get('/?query=bbq')
        ->assertSee('BBQ')
        ->assertDontSeeText('Pizza')
        ->assertDontSeeText('Taco');
}
}
