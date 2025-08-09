<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => [
            'required',
            'string',
            'size:9',
            new PhoneNumberRule(),
            'unique:users,phone_number,' . $this->route('user'),
        
        ],
            'password' => 'sometimes|required|string|min:8|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'last_name.required' => 'The last name is required.',
            'first_name.required' => 'The first name is required.',
            'email.required' => 'The email address is required.',
            'phone_number.required' => 'The phone number is required.',
            'password.required' => 'The password is required.',
            'email.unique' => 'This email address is already in use.',
            'phone_number.unique' => 'This phone number is already in use.',
        ];
    }

}
