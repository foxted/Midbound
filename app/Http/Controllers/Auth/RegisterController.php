<?php

namespace Midbound\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use Laravel\Spark\Events\Auth\UserRegistered;
use Midbound\Http\Controllers\Controller;
use Midbound\Http\Requests\Auth\RegisterRequest;
use Midbound\Interactions\Auth\Register;
use Midbound\Website;
use Spark;
use Illuminate\Foundation\Auth\RedirectsUsers;

/**
 * Class RegisterController
 * @package Midbound\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    use RedirectsUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('app.activity');
    }

    /**
     * Show the application registration form.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showRegistrationForm(Request $request)
    {
        if (Spark::promotion() && ! $request->has('coupon')) {
            // If the application is running a site-wide promotion, we will redirect the user
            // to a register URL that contains the promotional coupon ID, which will force
            // all new registrations to use this coupon when creating the subscriptions.
            return redirect($request->fullUrlWithQuery([
                'coupon' => Spark::promotion()
            ]));
        }

        return view('spark::auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        Auth::login($user = Spark::interact(
            Register::class, [$request]
        ));

        event(new UserRegistered($user));

        // Create website
        if($request->has('website')) {
            $website = Website::create([
                'url' => $request->get('website')
            ]);

            return response()->json([
                'redirectUrl' => $website->installUrl
            ]);
        }

        return response()->json([
            'redirectUrl' => route('app.activity')
        ]);
    }
}