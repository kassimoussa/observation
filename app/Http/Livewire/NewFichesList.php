<?php

namespace App\Http\Livewire;

use App\Models\Document;
use App\Models\Fiche;
use App\Models\Fiche2;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class NewFichesList extends Component
{
    public $searche, $fiches;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $delete_id;

      public function mount()
    { 
        $this->fiches =  Fiche2::where('avis_nv2', null)->get();
    }

    public function deleteFicheConfirm($id)
    {
        //$patient = Patient::where('id', $id)->first();   
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-fiche-delete-modal');
    }

    public function deleteFiche()
    {
        Fiche2::destroy($this->delete_id);
        $docs = Document::where('numero_fiche', $this->delete_id)->get();

        if ($docs) {
            foreach ($docs as $doc) {
                Storage::delete('public/files/' . $doc->file_name);
                $doc->delete();
            }
        }

        $this->fiches =  Fiche2::where('avis_nv2', null)->orderBy('created_at', 'desc')->get();
        session()->flash('success', 'Fiche supprimé avec succès ');
    }

    public function render()
    {
        return view('livewire.new-fiches-list');
        //return view('livewire.counter');
    }
}
