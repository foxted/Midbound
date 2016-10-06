<?php

namespace Midbound\Http\Requests\Prospects;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProspect
 * @package Midbound\Http\Requests\Prospects
 */
class UpdateProspect extends FormRequest
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
            'name' => 'sometimes',
            'email' => 'required|email',
            'phone' => 'sometimes',
            'company' => 'sometimes'
        ];
    }
}
