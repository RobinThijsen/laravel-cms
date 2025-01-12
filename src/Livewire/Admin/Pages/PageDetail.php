<?php

namespace LaravelCMS\Livewire\Admin\Pages;

use LaravelCMS\Livewire\Admin\LaravelCMSComponent as Component;
use LaravelCMS\Models\Page;

class PageDetail extends Component
{
    public Page $page;

    public function mount()
    {
        parent::init();
    }

    public function render()
    {
        return view('cms::livewire.admin.dashboard');
    }
}
