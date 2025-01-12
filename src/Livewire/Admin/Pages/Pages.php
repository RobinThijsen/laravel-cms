<?php

namespace LaravelCMS\Livewire\Admin\Pages;

use LaravelCMS\Exceptions\NoTableForSortable;
use LaravelCMS\Livewire\Admin\LaravelCMSComponent as Component;
use LaravelCMS\Models\Page;
use LaravelCMS\Trait\LaravelCMSTrait;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination, LaravelCMSTrait;

    public function mount()
    {
        parent::init();
    }

    /**
     * @throws NoTableForSortable
     */
    public function render()
    {
        $this->table = config('cms.database.prefix') . 'pages';
        $pages = Page::orderBy($this->getBy(), $this->sortedDirection)
            ->paginate(config('cms.app.pagination'));
        return view('cms::livewire.admin.dashboard', compact('pages'));
    }
}
