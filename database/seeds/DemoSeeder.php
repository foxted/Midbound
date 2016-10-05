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
        $visitorsWithProspect = factory(\Midbound\Visitor::class)->times(50)->make();
        $visitorsWithProspect->each(function($visitor) use ($team, $website) {
            $visitor->team()->associate($team);
            $visitor->website()->associate($website);
            $visitor->save();
        });

        $prospects = factory(\Midbound\Prospect::class)->times(50)->make();
        $prospects->each(function($prospect) use ($team) {
            $prospect->team()->associate($team)->save();
        });

        $i = 1;
        foreach($visitorsWithProspect as $visitor) {
            $visitor->prospect()->associate($prospects->find($i))->save();
            $i++;
        }

        $events = factory(\Midbound\VisitorEvent::class)->times(50)->make();
        $events->each(function($event) use ($visitorsWithProspect, $team){
            $event->visitor()->associate($visitorsWithProspect->random(1));
            $event->team()->associate($team);
            $event->save();
        });

    }
}
