<?php

namespace App\Http\Livewire;

use App\Models\Document;
use App\Models\Fiche;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateFiche extends Component
{
    use WithFileUploads;

    public $id_time, $nom_client, $adresse_client,
        $num_compte, $type, $service,
        $num_facture, $mont_facture, $date_ajout;
    
    public $files = [];

    protected $rules = [
        'nom_client' => 'required',
        'adresse_client' => 'required',
        'num_compte' => 'required',
        'type' => 'required',
        'service' => 'required',
        'num_facture' => 'required',  
        'mont_facture' => 'required', 
        'image' => 'image|max:1024',
    ];

    public function cancel()
    {
        $this->reset();
    }

    public function store()
    {
        $this->id_time = time();
        $this->date_ajout = date('Y-m-d H:i:s');

        $fiche = new Fiche();
        $fiche->nom_client = $this->nom_client;
        $fiche->adresse_client = $this->adresse_client;
        $fiche->num_client = $this->num_client;
        $fiche->type = $this->type;
        $fiche->service = $this->service;
        $fiche->num_facture = $this->num_facture;
        $fiche->mont_facture = $this->mont_facture;
        $fiche->date_ajout = $this->date_ajout;
        $fiche->id_time = $this->id_time;
        $fiche->subimtby = session('username');
        $query = $fiche->save();

        if($query)
        {
            foreach ($this->files as $key => $file) { 
                $name = time() . '_' . $file->getClientOriginalName();
                $insert[$key]['file_name'] = $name;
                $insert[$key]['path'] = "storage/files/".$name;
                $insert[$key]['numero_fiche'] = $this->id_time;
                $file->storeAs('public/files', $name); 
            }
            Document::insert($insert);
        }

    }

    public function render()
    {
        return view('livewire.create-fiche');
    }
}
