<?php

namespace LaravelCMS\Models;

use LaravelCMS\Models\LaravelCMSModel as Model;

class PageContentLang extends Model
{
    protected $table = 'page_content_langs';

    protected $fillable = [
        'cms_page_content_id',
        'cms_lang_id',
        'name',
        'label',
        'value',
    ];
}
