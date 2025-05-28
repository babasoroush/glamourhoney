<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class userProfileRequest extends FormRequest
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
        $userId = $this->user()->id;
        return [
            'name' => ['required', 'string', 'max:255'],
            'PhoneNumber' => [
                'required',
                'string',
                'regex:/^(\+98|0)?9\d{9}$/',
                Rule::unique('users')->ignore($userId),
            ],
            'PostalCode' => [
                'required',
                'string',
                'max:20'
            ],
            'address' => [
                'required',
                'string',
                'max:500'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.sometimes' => 'نام اختیاری است.',
            'name.string' => 'نام باید یک رشته معتبر باشد.',
            'name.max' => 'نام نباید بیشتر از 255 کاراکتر باشد.',

            'PhoneNumber.required' => 'شماره تلفن الزامی است.',
            'PhoneNumber.string' => 'شماره تلفن باید یک رشته معتبر باشد.',
            'PhoneNumber.regex' => 'فرمت شماره تلفن نامعتبر است.',
            'PhoneNumber.unique' => 'این شماره تلفن قبلاً ثبت شده است.',

            'PostalCode.required' => 'کد پستی الزامی است.',
            'PostalCode.string' => 'کد پستی باید یک رشته معتبر باشد.',
            'PostalCode.max' => 'کد پستی نباید بیشتر از 20 کاراکتر باشد.',

            'address.required' => 'آدرس الزامی است.',
            'address.string' => 'آدرس باید یک رشته معتبر باشد.',
            'address.max' => 'آدرس نباید بیشتر از 500 کاراکتر باشد.',
        ];
    }
}
