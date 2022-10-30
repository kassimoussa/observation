<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardIcon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $icon, $title, $url, $cnt; 

    public function __construct($icon, $title, $url, $cnt)
    {
        $this->icon = $icon ;
        $this->title = $title ;
        $this->url = $url ;
        $this->cnt = $cnt ;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-icon');
    }
}
