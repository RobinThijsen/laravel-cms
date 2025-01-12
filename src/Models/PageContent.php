<?php

namespace LaravelCMS\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;
use LaravelCMS\Models\LaravelCMSModel as Model;

class PageContent extends Model
{
    protected $table = 'page_contents';

    protected $fillable = [
        'cms_page_id',
        'cms_page_content_type_id',
        'name',
        'section',
        'position',
    ];

    public function contentLangs(): HasMany
    {
        return $this->hasMany(PageContentLang::class);
    }

    public static function getContentByAlias(string $alias): mixed
    {
        $pageContent = PageContent::where('alias', $alias)
            ->first();

        if (empty($pageContent))
            return null;

        $lang = Lang::findByLocale(App::currentLocale());

        return $pageContent->contentLangs()
            ->where('cms_lang_id', $lang->id)
            ->where('cms_page_content_id', $pageContent->id)
            ->first()
            ->value;
    }
}
