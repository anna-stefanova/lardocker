<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contact_successful_page()
    {
        $response = $this->get(route('contact.index'));
        $response->assertStatus(200);
    }

    public function test_contact_store_successful_page()
    {
        $response = $this->get(route('contact.store'));
        $response->assertStatus(200);

    }

}
