<?php

namespace Midbound\Http\Controllers\Auth;

/**
 * Class LoginController
 * @package Midbound\Http\Controllers\Auth
 */
class LoginController extends \Laravel\Spark\Http\Controllers\Auth\LoginController
{
    public function __construct()
    {
        $this->redirectTo = route('app.activity');
    }
}