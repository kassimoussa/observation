<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Fiche;
use Illuminate\Http\Request;
use PDF;

class FicheController extends Controller
{
    public function create()
    {
        $level = session('level');
        return view($level . '.new_fiche');
    }

    public function store(Request $request)
    {
        $level = session('level');
        $fiche = new Fiche();
        $fiche->id_time = $request->id_time;
        $fiche->nom_client = $request->nom_client;
        $fiche->adresse_client = $request->adresse_client;
        $fiche->num_compte = $request->num_compte;
        $fiche->num_facture = $request->num_facture;
        $fiche->mont_facture = $request->mont_facture;
        $fiche->obs_cs_facturation = $request->obs_cs_facturation;
        $fiche->type = $request->type;
        $fiche->service = $request->service;
        $fiche->subimtby = session('username');
        $fiche->date_ajout = $request->date_ajout;
        $query = $fiche->save();

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) { 
                $name = time() . '_' . $file->getClientOriginalName();
                $insert[$key]['file_name'] = $name;
                $path = $file->storeAs('public/files', $name); 
                $insert[$key]['path'] = "storage/files/".$name;
                $insert[$key]['numero_fiche'] = $request->id_time;
            }
            Document::insert($insert);
        }
        

        if ($query) {
            return redirect('/index')->with('success', 'Ajout réussi');
        } else {
            return back()->with('fail', 'Echec de l\'ajout ');
        }
    }

    public function show(Fiche $fiche)
    {
        $level = session('level');
        $url = $level . '.voir_fiche';
        $documents = Document::where('numero_fiche', $fiche->id_time)->get();
        return view($url, compact('fiche', 'documents'));
    }

    public function edit(Fiche $fiche)
    {
        $level = session('level');
        $url = $level . '.edit_fiche';
        return view($url, compact('fiche'));
    }

    public function pdf(Fiche $fiche)
    {
        $pdf = PDF::loadView('pdf.fichepdf', compact('fiche'));
        // $pdf = PDF::loadView('welcome', compact('fiche'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('fiche_observation.pdf');
    }

    public function update(Request $request, Fiche $fiche)
    {
        $fiche->update($request->all());
        /* $fiche->update(['status' => $request->new_password]); */
        return redirect('index')->with('success', 'Modification réussie');
    }

    public function destroy(Fiche $fiche)
    {
        $fiche->delete();

        return back()->with('success', 'Fiche supprimée');
    }

    public function stats()
    {
        $annee = '';

        for ($i = 1; $i <= 12; $i++) {
            $rentres[$i] = Fiche::whereMonth('date_ajout',  $i)->count();
        }

        $janvier = Fiche::whereMonth('date_ajout',  "1")->orderby('created_at', 'desc')->get();
        $fevrier = Fiche::whereMonth('date_ajout',  "2")->orderby('created_at', 'desc')->get();
        $mars = Fiche::whereMonth('date_ajout',  "3")->orderby('created_at', 'desc')->get();
        $avril = Fiche::whereMonth('date_ajout',  "4")->orderby('created_at', 'desc')->get();
        $mai = Fiche::whereMonth('date_ajout',  "5")->orderby('created_at', 'desc')->get();
        $juin = Fiche::whereMonth('date_ajout',  "6")->orderby('created_at', 'desc')->get();
        $juillet = Fiche::whereMonth('date_ajout',  "7")->orderby('created_at', 'desc')->get();
        $aout = Fiche::whereMonth('date_ajout',  "8")->orderby('created_at', 'desc')->get();
        $septembre = Fiche::whereMonth('date_ajout',  "9")->orderby('created_at', 'desc')->get();
        $octobre = Fiche::whereMonth('date_ajout',  "10")->orderby('created_at', 'desc')->get();
        $novembre = Fiche::whereMonth('date_ajout',  "11")->orderby('created_at', 'desc')->get();
        $decembre = Fiche::whereMonth('date_ajout',  "12")->orderby('created_at', 'desc')->get();

        return view('stats', compact('annee', 'rentres', 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre',));
    }
}
