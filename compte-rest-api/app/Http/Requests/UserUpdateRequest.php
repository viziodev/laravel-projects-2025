<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'sometimes|required|string|max:255',
            'first_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:users,email,' . $this->route('user'),
            'phone_number' => [
                'sometimes',
                'required',
                'string',
                'size:9',
                'unique:users,phone_number,' . $this->route('user'),
                new PhoneNumberRule(),
            ],
            'password' => 'sometimes|required|string|min:8|confirmed',
        ];
    }
}
