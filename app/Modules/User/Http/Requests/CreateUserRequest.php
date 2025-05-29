<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(),
            ],
            'PhoneNumber' => 'nullable|string|max:20',
            'PostalCode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است.',
            'name.string' => 'نام باید یک رشته معتبر باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از 255 کاراکتر باشد.',
            'email.required' => 'وارد کردن ایمیل الزامی است.',
            'email.string' => 'ایمیل باید یک رشته معتبر باشد.',
            'email.email' => 'فرمت ایمیل نامعتبر است.',
            'email.max' => 'ایمیل نمی‌تواند بیشتر از 255 کاراکتر باشد.',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
            'password.string' => 'رمز عبور باید یک رشته معتبر باشد.',
            'password.min' => 'رمز عبور حداقل باید 8 کاراکتر باشد.',
            'password.mixedCase' => 'رمز عبور باید شامل حروف بزرگ و کوچک باشد.',
            'password.numbers' => 'رمز عبور باید شامل اعداد باشد.',
            'password.symbols' => 'رمز عبور باید شامل نمادها باشد.',
            'password.uncompromised' => 'این رمز عبور در دیتابیس‌های لو رفته پیدا شده است. لطفاً رمز دیگری انتخاب کنید.',
            'password.confirmed' => 'تایید رمز عبور با رمز عبور مطابقت ندارد.',
            'PhoneNumber.string' => 'شماره تلفن باید یک رشته معتبر باشد.',
            'PhoneNumber.max' => 'شماره تلفن نمی‌تواند بیشتر از 20 کاراکتر باشد.',
            'PostalCode.string' => 'کد پستی باید یک رشته معتبر باشد.',
            'PostalCode.max' => 'کد پستی نمی‌تواند بیشتر از 10 کاراکتر باشد.',
            'address.string' => 'آدرس باید یک رشته معتبر باشد.',
            'address.max' => 'آدرس نمی‌تواند بیشتر از 500 کاراکتر باشد.',
        ];
    }
}
