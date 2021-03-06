<?php

namespace App\Http\Requests\API;

use App\Models\Cuentas;
use InfyOm\Generator\Request\APIRequest;

class UpdateCuentasAPIRequest extends APIRequest
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
        return Cuentas::$rules;
    }
}
