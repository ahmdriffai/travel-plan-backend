<?php

namespace Tests\Feature\Controller;

use App\Models\ListTravel;
use App\Models\Place;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListTravelControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    
    public function test_store_list_travel()
    {
        $place = Place::factory()->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->post('api/list-travel', [
            'user_id' => $this->user->id,
            'place_id' => $place->id,
        ]);

        $response->assertStatus(201);

    }

    public function test_get_all_list_travel() {
        ListTravel::factory()->create(['user_id' => $this->user->id]);
        $response = $this->actingAs($this->user)
                    ->get('/api/list-travel');

        $response->assertStatus(200);
    }

}
