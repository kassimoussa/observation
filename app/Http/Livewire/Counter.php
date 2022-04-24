<?php

namespace App\Http\Livewire;

use App\Models\Fiche;
use Livewire\Component;
use Livewire\WithPagination;

class Counter extends Component
{
    //public $fiches ;
    public $searche ;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $delete_id;
 
    public function deleteFicheConfirm($id)
    {
        //$patient = Patient::where('id', $id)->first();   
        $this->delete_id = $id;   
        $this->dispatchBrowserEvent('show-fiche-delete-modal');
    }

    public function deleteFiche()
    {
        Fiche::destroy($this->delete_id);
        
        /* $patient = Patient::where('id', $this->delete_id)->first();   
        $patient->delete;  */
        session()->flash('success', 'Fiche supprimer avec success ');
    }

    public function render()
    {
        /* $searche = '%'. $this->searche .'%' ; */
        // sleep(1);
        $searche =  $this->searche  ;
        $fiches =  Fiche::where(function ($query) use ($searche) {
            $query->where('id',  $searche)
                ->orWhere('num_facture', 'Like', '%' . $searche . '%')
                ->orWhere('nom_client', 'Like', '%' . $searche . '%')
                ->orWhere('num_compte', 'Like', '%' . $searche . '%')
                ->orWhere('type', 'Like', '%' . $searche . '%')
                ->orWhere('avis', 'Like',  $searche . '%')
                ->orWhere('service', 'Like', '%' . $searche . '%');
        })->orderBy('id', 'desc')->paginate(10);
        return view('livewire.counter', ['fiches' => $fiches]);
        //return view('livewire.counter');
    }
}
