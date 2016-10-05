<?php

class WebActivityTest extends TestCase
{
    /** @test */
    public function it_can_update_the_prospect_assignee()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);

        $this->actingAs($user)
             ->visit(route('app.activity'))
             ->assertResponseOk();
    }
}
