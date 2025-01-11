<?php

namespace LaravelCMS\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelCMS\Models\User;

/**
 * @method static User|null user();
 *
 * @see \LaravelCMS\LaravelCMS\Helpers\UserConnected
 */
class UserConnected extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \LaravelCMS\Helpers\UserConnected::class;
    }
}
