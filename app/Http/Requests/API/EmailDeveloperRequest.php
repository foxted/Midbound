<?php

namespace Midbound\Http\Requests\API;

use Midbound\Http\Requests\Request;

/**
 * Class EmailDeveloperRequest
 * @package Midbound\Http\Requests\API
 */
class EmailDeveloperRequest extends Request
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
            'email' => 'required|email'
        ];
    }
}
