<?php

namespace Midbound\Http\Controllers\API;

use Mail;
use Midbound\Http\Controllers\Controller;
use Midbound\Http\Requests\API\EmailDeveloperRequest;
use Midbound\Website;

/**
 * Class EmailDeveloperController
 * @package Midbound\Http\Controllers\Auth\API
 */
class EmailDeveloperController extends Controller
{
    /**
     * @param EmailDeveloperRequest $request
     * @param Website $website
     * @return string
     */
    public function store(EmailDeveloperRequest $request, Website $website)
    {
        $currentUser = auth()->user();
        $email = $request->get('email');

        Mail::send('emails.install-website', ['website' => $website, 'user' => $currentUser], function ($m) use ($currentUser, $email) {
            $m->to($email)->subject("{$currentUser->name} needs your help!");
        });

        return response()->json([]);
    }
}
