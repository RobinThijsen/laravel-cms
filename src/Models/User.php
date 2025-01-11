<?php

namespace LaravelCMS\Models;

use LaravelCMS\Models\LaravelCMSModel as Model;

class User extends Model
{
//    protected $table = 'cms_users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function privileges()
    {
        return $this->belongsToMany(Privilege::class)
            ->withTimestamps();
    }

    public function hasPrivileges(mixed $privileges): bool
    {
        $userPrivileges = $this->privileges;
        if (is_array($privileges)) {
            foreach ($privileges as $privilege) {
                if ($userPrivileges->contains($privilege)) {
                    return true;
                }
            }

            return false;
        }

        return $userPrivileges->contains($privileges);
    }
}
