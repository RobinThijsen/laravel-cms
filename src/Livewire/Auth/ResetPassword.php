<?php

namespace LaravelCMS\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use LaravelCMS\Models\User;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ResetPassword extends Component
{
    const STEP_REQUEST = 'request';
    const STEP_RESET = 'reset';

    #[Validate]
    public string $email = "";

    #[Validate]
    public string $password = "";
    public string $password_confirmation = "";

    #[Url]
    public string $step = self::STEP_REQUEST;

    public function previous()
    {
        if ($this->step === self::STEP_RESET) {
            $this->step = self::STEP_REQUEST;
        }
    }

    public function request()
    {
        $this->validateOnly('email');
        $this->step = self::STEP_RESET;
    }

    public function reset()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        $user->update(['password' => Hash::make($this->password)]);
        session()->flash('success', 'Password reset successfully');
        $this->redirect(Login::class);
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:cms_users,email'],
            'password' => ['required', Password::default(), 'confirmed'],
        ];
    }
}
