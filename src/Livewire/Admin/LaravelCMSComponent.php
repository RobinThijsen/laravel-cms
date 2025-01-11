<?php

namespace LaravelCMS\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use LaravelCMS\Facades\UserConnected;
use LaravelCMS\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LaravelCMSComponent extends Component
{
    public ?User $userConnected = null;

    public function init(): void
    {
        $this->userConnected = UserConnected::user();
    }
}
