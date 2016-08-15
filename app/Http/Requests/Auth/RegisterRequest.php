<?php

namespace Midbound\Http\Requests\Auth;

/**
 * Class RegisterRequest
 * @package Midbound\Http\Requests\Auth
 */
class RegisterRequest extends \Laravel\Spark\Http\Requests\Auth\RegisterRequest implements \Laravel\Spark\Contracts\Http\Requests\Auth\RegisterRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'team' => 'required',
            'website' => 'required'
        ];
    }
}
