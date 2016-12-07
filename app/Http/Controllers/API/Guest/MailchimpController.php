<?php

namespace Midbound\Http\Controllers\API\Guest;

use Illuminate\Http\Response;
use Mailchimp;
use Midbound\Http\Controllers\Controller;
use Midbound\Http\Requests\API\Guest\MailchimpRequest;

/**
 * Class MailchimpController
 * @package Midbound\Http\Controllers\API\Guest
 */
class MailchimpController extends Controller
{
    /**
     * @param Mailchimp $mailchimp
     * @param MailchimpRequest $request
     * @return \associative_array
     */
    public function store(Mailchimp $mailchimp, MailchimpRequest $request)
    {
        $subscription = $mailchimp->lists->subscribe(
            config('services.mailchimp.list'),
            ['email' => $request->get('email'), 'update_existing' => true]
        );

        return response()->json($subscription, Response::HTTP_CREATED);
    }
}
