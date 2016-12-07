<?php

namespace Midbound\Http\Requests\API\Guest;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MailchimpRequest
 * @package Midbound\Http\Requests\API\Guest
 */
class MailchimpRequest extends FormRequest
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
