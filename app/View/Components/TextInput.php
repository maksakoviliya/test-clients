<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $label;
    public $value;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $value, $name)
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
