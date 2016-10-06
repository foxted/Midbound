<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Midbound\Prospect;
use Midbound\Team;
use Midbound\User;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://midbound.dev';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createUser(array $attributes = [])
    {
        return factory(User::class)->create($attributes);
    }

    /**
     * @param User $user
     * @param array $attributes
     * @return mixed
     */
    public function createTeam(User $user, array $attributes = [])
    {
        $team = factory(Team::class)->make($attributes);
        $team->owner()->associate($user);
        $team->save();

        $team->users()->save($user, [
            'role' => 'owner'
        ]);

        return $team;
    }

    /**
     * @param Team $team
     * @param array $attributes
     * @return mixed
     */
    public function createProspect(Team $team, array $attributes = [])
    {
        $prospect = factory(Prospect::class)->make($attributes);
        $prospect->team()->associate($team);
        $prospect->save();

        return $prospect;
    }
}
