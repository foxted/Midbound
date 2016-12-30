<?php

namespace Midbound\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Midbound\Http\Controllers\Controller;
use Midbound\User;

/**
 * Class ValidateController
 * @package Midbound\Http\Controllers\Auth
 */
class ValidateController extends Controller
{
    /**
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index($email)
    {
        $email = decrypt($email);

        $user = User::whereEmail($email)->first();

        $user->confirm();
        
        return redirect()->route('app.activity');
    }
}
