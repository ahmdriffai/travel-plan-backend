<?php

namespace Tests\Feature\Controller;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_category()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('api/categories', [
            'name' => 'test',
        ]);

        $response->assertStatus(201);

    }

    public function test_get_all_category() {
        Category::factory(2)->create();
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }
}
