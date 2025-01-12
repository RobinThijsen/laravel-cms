<?php

namespace LaravelCMS\Models;

use LaravelCMS\Models\LaravelCMSModel as Model;

class PageContentType extends Model
{
    protected $table = 'page_content_types';

    protected $fillable = [
        'name',
        'position',
    ];

    const INPUT = 'input';
    const TEXTAREA = 'textarea';
    const WYSIWYG = 'wyiswyg';
    const IMAGE = 'image';
    const VIDEO = 'video';
}
