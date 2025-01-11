<?php

namespace LaravelCMS\Helpers;

use Illuminate\Support\Facades\Auth;
use LaravelCMS\Models\User;

class UserConnected
{
    public ?User $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function user(): ?User
    {
        return $this->user;
    }
}
