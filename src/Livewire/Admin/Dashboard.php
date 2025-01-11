<?php

namespace LaravelCMS\Livewire\Admin;

use LaravelCMS\Livewire\Admin\LaravelCMSComponent as Component;

class Dashboard extends Component
{
    public function mount()
    {
        parent::init();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
