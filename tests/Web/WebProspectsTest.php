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
             ->visit(route('app.prospects.show', $prospect))
             ->assertResponseOk();
    }

    /** @test */
    public function it_can_update_the_prospect_information()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);

        $prospect = $this->createProspect($team);

        $formData = [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'phone' => '123-456-7890',
            'company' => 'Acme Inc.'
        ];

        $this->actingAs($user)
             ->visit(route('app.prospects.edit', $prospect))
             ->see($prospect->name)
             ->see($prospect->email)
             ->see($prospect->phone)
             ->see($prospect->company)
             ->submitForm('Save', $formData)
             ->seePageIs(route('app.prospects.show', $prospect))
             ->see('alert-success')
             ->see($formData['name'])
             ->see($formData['email'])
             ->see($formData['phone'])
             ->see($formData['company']);
    }
}
