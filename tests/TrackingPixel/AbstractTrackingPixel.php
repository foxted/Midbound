<?php

/**
 * Class AbstractTrackingPixel
 */
class AbstractTrackingPixel extends TestCase
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * AbstractTrackingPixel constructor.
     */
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }
    /**
     * @return array
     */
    public function createWebsite()
    {
        // Create user
        $user = factory(\Midbound\User::class)->create();

        // Create a team
        $team = factory(\Midbound\Team::class)->make();
        $team->owner()->associate($user);
        $team->save();

        // Create a website
        $website = factory(\Midbound\Website::class)->make();
        $website->team()->associate($team);
        $website->save();

        $this->seeInDatabase('websites', [
            'hash' => $website->hash,
            'url' => $website->url,
            'team_id' => $team->id
        ]);

        return [$user, $team, $website];
    }

    /**
     * @param string $action
     * @param string $url
     * @param string $resource
     * @return string
     */
    protected function buildTrackingUrl($action = null, $resource = null, $type = null, $url = null)
    {
        list($user, $team, $website) = $this->createWebsite();

        $query = [
            'midac' => $action?:'pageview',
            'midurl' => $url ?: $this->faker->url,
            'midid' => $website->hash,
            'midguid' => $this->faker->uuid
        ];

        if ($resource) {
            $query['midrc'] = $resource;
        }

        if ($type) {
            $query['midtype'] = $type;
        }

        return route('tracking-url', $query);
    }
}
