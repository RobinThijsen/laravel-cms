<?php

namespace LaravelCMS\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public ?string $label;
    public bool $required;

    public function __construct($id, $label = null, $required = false)
    {
        $this->id = $id;
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('form::form.input');
    }
}
