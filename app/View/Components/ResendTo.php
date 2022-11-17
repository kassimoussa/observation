<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ResendTo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sendmodal, $users, $fiche;
    public function __construct($sendmodal, $users, $fiche)
    {
        $this->sendmodal = $sendmodal ;
        $this->users = $users ;
        $this->fiche = $fiche ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.resend-to');
    }
}
