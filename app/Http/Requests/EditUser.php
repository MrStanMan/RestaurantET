<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class EditUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::user()->can('update-user') || Auth::user()->hasRole('administrator');
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            'last_name' => ['string', 'max:64', 'nullable'],
            'insertion' => ['string', 'nullable', 'max:64', 'nullable'],
            'first_name' => ['string', 'max:64', 'nullable'],
            'address' => ['string', 'max:64', 'nullable'],
            'zipcode' => ['string', 'max:32', 'nullable'],
            'town' => ['string', 'max:64', 'nullable'],
            'telephone_nr' => ['digits_between:8,16', 'max:16', 'nullable'],
            'email' => ['email', 'max:64'],
        ];
    }
}
