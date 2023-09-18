<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProviderMatchOldPassword implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth::guard('providerpanel')->user()->password);
    }

    public function message()
    {
        return 'The :attribute is match with old password.';
    }
}
