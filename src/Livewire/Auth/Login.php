<?php

namespace LaravelCMS\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use LaravelCMS\Livewire\Admin\Dashboard;
use LaravelCMS\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate]
    public string $email = "";

    #[Validate]
    public string $password = "";

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!app()->environment('local')) {
            if (!Hash::check($this->password, $user->password)) {
                session()->flash('error', 'Invalid credentials');
                $this->redirect(Login::class);
            }
        }

        Auth::login($user);

        $this->redirect(Dashboard::class);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:cms_users,email'],
            'password' => ['required', Password::default()],
        ];
    }
}
