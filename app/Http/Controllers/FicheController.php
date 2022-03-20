<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use Illuminate\Http\Request;
use PDF;

class FicheController extends Controller
{
    public function create()
    {
        $level = session('level');
        return view($level.'.new_fiche');
    }

    public function store(Request $request)
    {
        $level = session('level');
        $fiche = new Fiche();
        $fiche->nom_client = $request->nom_client;
        $fiche->adresse_client = $request->adresse_client;
        $fiche->num_compte = $request->num_compte;
        $fiche->num_facture = $request->num_facture;
        $fiche->mont_facture = $request->mont_facture;
        $fiche->obs_cs_facturation = $request->obs_cs_facturation; 
        $fiche->type = $request->type; 
        $fiche->service = $request->service; 
        $fiche->subimtby = session('name');
        $fiche->date_ajout = $request->date_ajout;
        $query = $fiche->save();

        if ($query) { 
            return redirect('/index')->with('success', 'Ajout réussi');
        } else {
            return back()->with('fail', 'Echec de l\'ajout ');
        }
    }

    public function show(Fiche $fiche)
    {
        $level = session('level');
        $url = $level.'.voir_fiche';
        return view($url, compact('fiche'));
    }

    public function edit(Fiche $fiche)
    {
        $level = session('level');
        $url = $level.'.edit_fiche';
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
}
