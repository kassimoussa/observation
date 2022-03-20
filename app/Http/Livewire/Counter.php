<?php

namespace App\Http\Livewire;

use App\Models\Fiche;
use Livewire\Component;

class Counter extends Component
{
    public $fiches ;
    public $searche ;
 
    public function increment()
    {
        $this->count++;
        /* session()->flash('message', 'Post successfully updated.');
        return redirect()->to('/index2'); */
    }

    public function render()
    {
        /* $searche = '%'. $this->searche .'%' ; */
        // sleep(1);
        $searche =  $this->searche  ;
        $this->fiches =  Fiche::where(function ($query) use ($searche) {
            $query->where('id',  $searche)
                ->orWhere('num_facture', 'Like', '%' . $searche . '%')
                ->orWhere('nom_client', 'Like', '%' . $searche . '%')
                ->orWhere('num_compte', 'Like', '%' . $searche . '%')
                ->orWhere('type', 'Like', '%' . $searche . '%')
                ->orWhere('status', 'Like',  $searche . '%')
                ->orWhere('service', 'Like', '%' . $searche . '%');
        })->orderBy('id', 'desc')->get();
        return view('livewire.counter');
    }
}
