<?php

class WebProspectsTest extends TestCase
{
    /** @test */
    public function it_can_show_the_prospect_details()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);

        $prospect = $this->createProspect($team);

        $this->actingAs($user)
             ->visit(route('app.prospects.show', $prospect->id))
             ->assertResponseOk();
    }
}
