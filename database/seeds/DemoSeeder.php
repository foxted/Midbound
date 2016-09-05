<?php

use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a user
        $user = factory(\Midbound\User::class)->create([
            'email' => 'demo@midbound.com'
        ]);

        // Create a team
        $team = factory(\Midbound\Team::class)->create();
        $team->owner()->associate($user)->save();

        // Add user to team
        $team->users()->save($user, ['role' => 'owner']);

        // Add a website to team
        $website = factory(\Midbound\Website::class)->make();
        $website->team()->associate($team)->save();

        // Create visitors without prospects
        $visitors = factory(\Midbound\Visitor::class)->times(10)->make();
        $visitors->each(function($visitor) use ($team, $website) {
            $visitor->team()->associate($team);
            $visitor->website()->associate($website);
            $visitor->save();
        });

        // Create visitors with prospect
        $prospects = factory(\Midbound\Prospect::class)->times(10)->make();
        $prospects->each(function($prospect) use ($team) {
            $prospect->team()->associate($team)->save();
        });
        $visitorsWithProspect = factory(\Midbound\Visitor::class)->times(10)->make();
        $visitorsWithProspect->each(function($visitor) use ($team, $website, $prospects) {
            $visitor->team()->associate($team);
            $visitor->website()->associate($website);
            $visitor->prospect()->associate($prospects->random(1));
            $visitor->save();
        });

    }
}
