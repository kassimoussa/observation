<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableauX extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $fiches;

    public function __construct($fiches)
    {
       $this->fiches = $fiches;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tableau-x');
    }
}
