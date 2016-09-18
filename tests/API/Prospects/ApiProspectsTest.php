<?php

class ApiProspectsTest extends TestCase
{
    /** @test */
    public function it_can_update_the_prospect_assignee()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);
        $prospect = $this->createProspect($team);

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'assignee_id' => null
        ]);

        $this->actingAs($user)
            ->put(
                route('prospects.update', $prospect->id),
                ['assignee_id' => $user->id]
            );

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'assignee_id' => $user->id
        ]);
    }

    /** @test */
    public function it_can_ignore_a_prospect()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);
        $prospect = $this->createProspect($team);

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'is_ignored' => "null"
        ]);

        $this->actingAs($user)
            ->put(
                route('prospects.update', $prospect->id),
                ['is_ignored' => true]
            );

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'is_ignored' => true
        ]);
    }

    /** @test */
    public function it_can_track_a_prospect_again()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);
        $prospect = $this->createProspect($team);

        $prospect->is_ignored = true;
        $prospect->save();

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'is_ignored' => true
        ]);

        $this->actingAs($user)
            ->put(
                route('prospects.update', $prospect->id),
                ['is_ignored' => false]
            );

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'is_ignored' => false
        ]);
    }

    /** @test */
    public function it_can_reset_the_prospect_assignee()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);
        $prospect = $this->createProspect($team);

        $prospect->assignee()->associate($user);
        $prospect->save();

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'assignee_id' => $user->id
        ]);

        $this->actingAs($user)
            ->put(
                route('prospects.update', $prospect->id),
                ['assignee_id' => "null"]
            );

        $this->seeInDatabase('prospects', [
            'id' => $prospect->id,
            'assignee_id' => null
        ]);
    }
}
