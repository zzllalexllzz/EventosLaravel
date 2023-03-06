<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputweb extends Component
{
    public $type;
    public $name;
    public $value;
    public $texto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $value, $texto)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->texto = $texto;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputweb');
    }
}
