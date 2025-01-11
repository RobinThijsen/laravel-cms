<?php

namespace LaravelCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LaravelCMSModel extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    public static function booted(): void
    {
        parent::booted();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function getTable(): string
    {
        return config('cms.database.prefix') . $this->table;
    }
}
