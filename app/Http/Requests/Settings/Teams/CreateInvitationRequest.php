<?php

namespace Midbound\Http\Requests\Settings\Teams;

use Laravel\Spark\Http\Requests\Settings\Teams\CreateInvitationRequest as FormRequest;

class CreateInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->ownsTeam($this->team) || $this->user()->onTeam($this->team));
    }

    
}
