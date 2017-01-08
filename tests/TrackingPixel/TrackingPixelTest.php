<?php

use Midbound\Prospect;

class TrackingPixelTest extends AbstractTrackingPixel
{
    /** @test */
    public function it_can_track_a_pageview_event()
    {
        $trackingUrl = $this->buildTrackingUrl('pageview');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'pageview'
            ]);
    }

    /** @test */
    public function it_can_track_a_click_event()
    {
        $trackingUrl = $this->buildTrackingUrl('click', 'this');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'click',
                'resource' => 'this'
            ]);
    }

    /** @test */
    public function it_can_track_a_download_event()
    {
        $trackingUrl = $this->buildTrackingUrl('download', 'this');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'download',
                'resource' => 'this'
            ]);
    }

    /** @test */
    public function it_can_track_a_subscribe_event()
    {
        $trackingUrl = $this->buildTrackingUrl('subscribe', 'this');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'subscribe',
                'resource' => 'this'
            ]);
    }

    /** @test */
    public function it_can_track_a_capture_event_with_name()
    {
        $trackingUrl = $this->buildTrackingUrl('capture', 'John Doe', 'name');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => 'John Doe'
            ])
            ->seeInDatabase('prospects', [
                'name' => 'john doe'
            ]);
    }

    /** @test */
    public function it_can_track_a_capture_event_with_email()
    {
        $trackingUrl = $this->buildTrackingUrl('capture', 'john@doe.com', 'email');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => 'john@doe.com'
            ])
            ->seeInDatabase('prospects', [
                'email' => 'john@doe.com'
            ]);
    }

    /** @test */
    public function it_can_track_a_capture_event_with_company()
    {
        $trackingUrl = $this->buildTrackingUrl('capture', 'Acme Inc.', 'company');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => 'Acme Inc.'
            ])
            ->seeInDatabase('prospects', [
                'company' => 'acme inc.'
            ]);
    }

    /** @test */
    public function it_can_track_a_capture_event_with_phone()
    {
        $trackingUrl = $this->buildTrackingUrl('capture', '123-456-7890', 'phone');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => '123-456-7890'
            ])
            ->seeInDatabase('prospects', [
                'phone' => '123-456-7890'
            ]);
    }

    /** @test */
    public function it_cannot_track_a_random_event()
    {
        $trackingUrl = $this->buildTrackingUrl('capture', '@laravelphp', 'twitter');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => '@laravelphp'
            ])
            ->dontSeeInDatabase('prospects', [
                'name' => '@laravelphp'
            ])
            ->dontSeeInDatabase('prospects', [
                'email' => '@laravelphp'
            ])
            ->dontSeeInDatabase('prospects', [
                'phone' => '@laravelphp'
            ])
            ->dontSeeInDatabase('prospects', [
                'company' => '@laravelphp'
            ]);
    }

    /** @test */
    public function it_can_connect_a_visitor_id_to_a_prospect_if_same_email()
    {
        $user = $this->createUser();
        $team = $this->createTeam($user);
        $prospect = $this->createProspect($team);

        $trackingUrl = $this->buildTrackingUrl('capture', $prospect->email, 'email');

        $this->visit($trackingUrl)
            ->seeInDatabase('visitor_events', [
                'action' => 'capture',
                'resource' => 'john@doe.com'
            ]);

        $this->assertEquals(1, Prospect::whereEmail($prospect->email)->count());
    }
}
