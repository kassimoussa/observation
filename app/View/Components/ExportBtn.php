<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExportBtn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $i;
    public function __construct($i)
    {
        $this->i = $i;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.export-btn');
    }
}
