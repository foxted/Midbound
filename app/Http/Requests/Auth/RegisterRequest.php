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
     * @return array
     */
    public function messages()
    {
        return [
            'website.required_without' => 'The website field is required.',
            'team.required_without' => 'The team field is required.',
        ];
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
            'team' => 'required_without:invitation',
            'website' => 'required_without:invitation|url'
        ];
    }
}
