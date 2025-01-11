<?php

namespace LaravelCMS\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelCMS\Models\LaravelCMSModel as Model;

class Page extends Model
{
//    protected $table = 'pages';

    protected $fillable = [
        'name',
        'position',
    ];

    public function scopeOrderBy($query, $field, $direction)
    {
        return $query->orderBy($field, $direction);
    }

    public function contents(): HasMany
    {
        return $this->hasMany(PageContent::class);
    }
}
