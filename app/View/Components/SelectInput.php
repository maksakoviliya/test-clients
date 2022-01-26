<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $label;
    public $value;
    public $name;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $value, $name, $options)
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = $name;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-input');
    }
}
