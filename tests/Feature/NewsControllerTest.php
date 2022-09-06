<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_successful_page()
    {
        $response = $this->get(route('news.index'));

        $response->assertViewHasAll(['categories', 'newsList'])
            ->assertSuccessful()
            ->assertOk()
            ->assertStatus(200);
    }

}
