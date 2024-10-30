<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/|min:10'
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'Поле не должно быть пустым',
            'name.required' => 'Поле не должно быть пустым',
            'phone.required' => 'Поле не должно быть пустым',
            'phone.regex' => 'Введите номер +7(***)-***-**-**',
            'phone.min' => 'Введите номер',
            'email.email' => 'Введите email (Например, example@exaple.com)',
        ];
    }
}
