<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    use RefreshDatabase; // if db changed, reset

    /** @test */
    public function a_user_can_crete_a_team()
    {
        // $this->withExceptionHandling();
        //given i am user who is logged in
        $this->actingAs(factory('App\User')->create()); // actingAs() auth user as current user
        $attributes = [
            'name' => 'Aperture',
        ];
        //when they hit the endpoint /teams
        $this->post('/teams', $attributes);
        //then there should be a new team in the database
        $this->assertDatabaseHas('teams', $attributes);
    }

    /** @test */
    public function guest_may_not_create_teams()
    {
        $this->withExceptionHandling();

        $this->post('/teams')->assertRedirect('/login');
    }
}
