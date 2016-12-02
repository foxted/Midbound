<?php

namespace Midbound\Http\Requests\Settings\Websites;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateWebsite
 * @package Midbound\Http\Requests\Settings\Websites
 */
class UpdateWebsite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|url'
        ];
    }
}
