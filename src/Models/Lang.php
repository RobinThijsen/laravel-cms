<?php

namespace LaravelCMS\Models;

use LaravelCMS\Models\LaravelCMSModel as Model;

class Lang extends Model
{
//    protected $table = 'cms_langs';

    protected $fillable = [
        'name',
        'locale',
        'position',
    ];

    public static function findByLocale(string $locale): ?self
    {
        return self::where('locale', $locale)->first();
    }
}
