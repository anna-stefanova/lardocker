<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email:rfc,dns', 'unique:App\Models\User,email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
            'is_admin' => ['required', 'filled']
        ];
    }
}
