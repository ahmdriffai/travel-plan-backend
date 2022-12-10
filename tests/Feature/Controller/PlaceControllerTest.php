<?php

namespace Tests\Feature\Controller;

use App\Models\Category;
use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PlaceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_place()
    {
        $category1 = Category::factory()->create(['name' => 'category1']);
        $category2 = Category::factory()->create(['name' => 'category2']);
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('api/places', [
            'name' => 'test',
            'location' => 'test',
            'price' => 1000,
            'description' => 'test',
            'categories' => [$category1->id, $category2->id]
        ]);

        $response->assertStatus(200)
                ->assertExactJson([
                    'success' => true,
                    'message' => 'Place Created',
                ]);
        $this->assertDatabaseHas('category_place', [
            'category_id' => $category1->id,
        ]);
        $this->assertDatabaseHas('category_place', [
            'category_id' => $category2->id,
        ]);
        $this->assertDatabaseCount('places', 1);
        $this->assertDatabaseCount('categories', 2);

    }

    public function test_get_all_place() {
        $response = $this->get('/api/places');

        $response->assertStatus(200);
    }

    public function test_find_place_by_id() {
        $place = Place::factory()->create();

        $response = $this->get('/api/places/' . $place->id);

        dd($response);
        $response->assertStatus(200);
    }
}
