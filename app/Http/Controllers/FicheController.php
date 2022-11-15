<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Fiche;
use App\Models\Fiche2;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class FicheController extends Controller
{
    /* public function create()
    {
        $level = session('level');
        return view($level . '.new_fiche');
    } */

    public function index()
    {
        $level = session('level');
        $username = session('username');

        if ($level == 1) {
            $nf = Fiche::where('nivo', "1")->count();
            $nv2f = Fiche::where('nivo', "2")->count();
            $nv3f = Fiche::where('nivo', "3")->count();
            $dcf = Fiche::where('nivo', "4")->count();
        } elseif ($level == 2) {
            $nf = Fiche::where('nivo', "1")->where('assignedto', $username)->count();
            $nv2f = Fiche::where('nivo', "2")->where('assignedto', $username)->count();
            $nv3f = Fiche::where('nivo', "3")->where('assignedto', $username)->count();
            $dcf = Fiche::where('nivo', "4")->where('assignedto', $username)->count();
        } elseif ($level == 3) { 
            $nf = Fiche::where('nivo', "1")->count();
            $nv2f = Fiche::where('nivo', "2")->count();
            $nv3f = Fiche::where('nivo', "3")->count();
            $dcf = Fiche::where('nivo', "4")->count();
        } elseif ($level == 4) { 
            $nf = Fiche::where('nivo', "1")->count();
            $nv2f = Fiche::where('nivo', "2")->whereNotNull('avis_nv2')->count();
            $nv3f = Fiche::where('nivo', "3")->count();
            $dcf = Fiche::where('nivo', "4")->count();
        } elseif ($level == 5) { 
             $fiches =  Fiche::where('trans', "dsi")->get();
             return view('4.index', compact('fiches'));
        }


        return view($level . '.index', compact('nf', 'nv2f', 'nv3f', 'dcf'));
    }

    public function index_nv2()
    {
        $level = session('level');
        $username = session('username');
        $nf = Fiche2::where('nivo', 1)->where('assignedto', $username)->count();
        $nv2f = Fiche2::where('nivo', 2)->where('assignedto', $username)->count();
        $nv3f = Fiche2::where('nivo', 3)->where('assignedto', $username)->count();
        $dcf = Fiche2::where('nivo', 4)->where('assignedto', $username)->count();

        return view($level . '.index', compact('nf', 'nv2f', 'nv3f', 'dcf'));
    }


    public function create()
    {
        $users = User::where('level', '2')->get();
        $level = session('level');
        return view($level . '.create', compact('users'));
    }

    public function new_fiches()
    {
        $users = User::where('level', '2')->get();
        $level = session('level');
        $username = session('username');
        if ($level == 1) {
            $fiches =  Fiche::where('nivo', "1")->orderBy('id', 'desc')->get();
        } elseif ($level == 2) {
            $fiches =  Fiche::where('nivo', "1")->where('assignedto', $username)->get();
        } elseif ($level == 3) { 
            $fiches =  Fiche::where('nivo', "1")->orderBy('id', 'desc')->get();
        } elseif ($level == 4) { 
            $fiches =  Fiche::where('nivo', "1")->orderBy('id', 'desc')->get();
        }

        return view('1.listes.new_fiches', compact('fiches', 'users'));
    }

    public function new_fiches_nv2()
    {
        $level = session('level');
        $username = session('username');
        $fiches =  Fiche::where('nivo', 1)->where('assignedto', $username)->orderBy('id', 'desc')->get();

        return view('1.listes.new_fiches', compact('fiches'));
    }

    public function nv2_fiches()
    {
        $users = User::where('level', '2')->get();
        $level = session('level');
        $username = session('username');
        if ($level == 1) {
            $fiches =  Fiche::where('nivo', "2")->orderBy('id', 'desc')->get();
        } elseif ($level == 2) {
            $fiches =  Fiche::where('nivo', "2")->where('assignedto', $username)->get();
        } elseif ($level == 3) {
            $fiches =  Fiche::where('nivo', "2")->get();
        } elseif ($level == 4) {
            $fiches =  Fiche::where('nivo', "2")->whereNotNull('avis_nv2')->get();
        }

        return view('1.listes.nv2_fiches', compact('fiches', 'users'));
    }

    public function nv3_fiches()
    {
        $level = session('level');
        $username = session('username');
        if ($level == 1) {
            $fiches =  Fiche::where('nivo', "3")->orderBy('id', 'desc')->get();
        } elseif ($level == 2) {
            $fiches =  Fiche::where('nivo', "3")->where('assignedto', $username)->get();
        } elseif ($level == 3) {
            $fiches =  Fiche::where('nivo', "3")->get();
        }elseif ($level == 4) {
            $fiches =  Fiche::where('nivo', "3")->get();
        }

        return view('1.listes.nv3_fiches', compact('fiches'));
    }
    public function dc_fiches()
    {
        $users = User::where('level', '2')->get();
        $level = session('level');
        $username = session('username');
        if ($level == 1) {
            $fiches =  Fiche::where('nivo', "4")->orderBy('id', 'desc')->get();
        } elseif ($level == 2) {
            $fiches =  Fiche::where('nivo', "4")->where('assignedto', $username)->get();
        } elseif ($level == 3) {
            $fiches =  Fiche::where('nivo', "4")->get();
        } elseif ($level == 4) {
            $fiches =  Fiche::where('nivo', "4")->get();
        } elseif ($level == 5) {
            $fiches =  Fiche::where('nivo', "4")->get();
        } 

        return view('1.listes.dc_fiches', compact('fiches', 'users'));
    }

    /*  public function store(Request $request)
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
    */

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
        $fiche->type = $request->type;
        $fiche->service = $request->service;
        $fiche->submitedby = session('username');
        $fiche->date_ajout = $request->date_ajout;
        $fiche->obs_nv1 = $request->obs_nv1;
        $fiche->assignedto = $request->assignedto;
        $query = $fiche->save();

        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $insert[$key]['file_name'] = $name;
                $file->storeAs('public/files', $name);
                $insert[$key]['path'] = "storage/files/" . $name;
                $insert[$key]['numero_fiche'] = $fiche->id_time;
            }
            Document::insert($insert);
        }


        if ($query) {
            /* return redirect('/index')->with('success', 'Ajout réussi'); */
            return redirect('fiches/new-fiches-list')->with('success', 'Ajout réussi');
        } else {
            return back()->with('fail', 'Echec de l\'ajout ');
        }
    }

    public function show(Fiche $fiche)
    {
        $level = session('level');
        $url = $level . '.voir_fiche';
        $documents = Document::where('numero_fiche', $fiche->id_time)->get();

        // $fiche2 = Fiche2::with('documents')->find($fiche);

        //dump($fiche2);

        return view($url, compact('fiche', 'documents'));
    }

    public function edit(Fiche $fiche)
    {
        $level = session('level');
        $url = $level . '.edit_fiche';
        $users = User::where('level', '2')->get();

        return view($url, compact('fiche', 'users'));
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
        return back()->with('success', 'Modification réussie');
    }

    public function update_nv2(Request $request, Fiche $fiche)
    {
        $fiche->update([
            //'avis_nv2' => $request->avis_nv2,
            'obs_nv2' => $request->obs_nv2,
            'date_nv2' => Carbon::now(),
            'nivo' => "2",
        ]);
        /* $fiche->update(['status' => $request->new_password]); */
        return back()->with('success', 'Modification réussie');
    } 
    public function update_nv2_cds(Request $request, Fiche $fiche)
    {
        $fiche->update([
            'avis_nv2' => $request->avis_nv2,
            'obs_nv2' => $request->obs_nv2,
            'date_nv2' => Carbon::now(),
            'nivo' => "2",
        ]);
        /* $fiche->update(['status' => $request->new_password]); */
        return back()->with('success', 'Modification réussie');
    }

    public function update_nv3(Request $request, Fiche $fiche)
    {
        $fiche->update([
            'status' => $request->status,
            'avis_nv3' => $request->avis_nv3,
            'obs_nv3' => $request->obs_nv3,
            'date_nv3' => Carbon::now(),
            'nivo' => "3",
        ]);
        /* $fiche->update(['status' => $request->new_password]); */
        return back()->with('success', 'Modification réussie');
    }

    public function transmettre(Request $request, Fiche $fiche)
    {
        $trans = $request->trans;

        $date = "date_".$trans;

        $fiche->update([  
            'trans' => $trans ,
            $date => Carbon::now(),
            'nivo' => "4",
        ]);
        /* $fiche->update(['status' => $request->new_password]); */
        return back()->with('success', 'Modification réussie');
    }

    public function reassigner(Request $request, Fiche $fiche)
    {
        $fiche->update([ 
            'avis_nv2' => null,
            'obs_nv2' => null,
            'avis_nv3' => null,
            'obs_nv3' => null,
            'assigntedto' => $request->assignedto,
            'nivo' => "1",
        ]);
        /* $fiche->update(['status' => $request->new_password]); */
        return back()->with('success', 'Modification réussie');
    }

    public function destroy(Fiche $fiche)
    {
        $id = $fiche->id_time;
        $fiche->delete();
        $docs = Document::where('numero_fiche', $id)->get();

        if ($docs) {
            foreach ($docs as $doc) {
                Storage::delete('public/files/' . $doc->file_name);
                $doc->delete();
            }
        }

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

        for ($i = 1; $i <= 12; $i++) {
            $degrevement[$i] = Fiche::where('type', 'Dégrevement')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $internet[$i] = Fiche::where('service', 'Internet')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $mobile[$i] = Fiche::where('service', 'Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $fix[$i] = Fiche::where('service', 'Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $internetfix[$i] = Fiche::where('service', 'Internet-Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $fixmobile[$i] = Fiche::where('service', 'Fix-Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $unk[$i] = Fiche::where('service', 'neon')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_m[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_i[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_f[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_if[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet-Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_fm[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix-Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_i_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_i_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_i_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_i_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_m_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_m_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_m_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_m_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_f_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_f_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_f_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_f_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_fm_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_fm_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_fm_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix-Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_fm_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_if_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_if_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_if_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet-Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_if_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $degrevement_unk_fav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'neon')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_unk_defav[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'neon')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_unk_null[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'neon')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_unk_annule[$i] = Fiche::where('type', 'Dégrevement')->where('service', 'neon')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();


            $degrevement_fav[$i] = Fiche::where('type', 'Dégrevement')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_defav[$i] = Fiche::where('type', 'Dégrevement')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_null[$i] = Fiche::where('type', 'Dégrevement')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $degrevement_annule[$i] = Fiche::where('type', 'Dégrevement')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
        }
        for ($i = 1; $i <= 12; $i++) {
            $ajustement[$i] = Fiche::where('type', 'Ajustement')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_m[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_i[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_f[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_if[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet-Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_fm[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix-Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();


            $ajustement_i_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_i_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_i_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_i_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_m_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_m_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_m_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_m_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_f_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_f_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_f_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_f_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_fm_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_fm_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_fm_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix-Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_fm_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_if_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_if_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_if_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet-Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_if_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'Internet-Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_unk_fav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'neon')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_unk_defav[$i] = Fiche::where('type', 'Ajustement')->where('service', 'neon')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_unk_null[$i] = Fiche::where('type', 'Ajustement')->where('service', 'neon')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_unk_annule[$i] = Fiche::where('type', 'Ajustement')->where('service', 'neon')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $ajustement_fav[$i] = Fiche::where('type', 'Ajustement')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_defav[$i] = Fiche::where('type', 'Ajustement')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_null[$i] = Fiche::where('type', 'Ajustement')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $ajustement_annule[$i] = Fiche::where('type', 'Ajustement')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
        }
        for ($i = 1; $i <= 12; $i++) {
            $occ[$i] = Fiche::where('type', 'OCC')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_m[$i] = Fiche::where('type', 'OCC')->where('service', 'Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_i[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_f[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_if[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet-Fix')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_fm[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix-Mobile')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();


            $occ_i_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_i_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_i_null[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_i_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_m_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_m_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_m_null[$i] = Fiche::where('type', 'OCC')->where('service', 'Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_m_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_f_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_f_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_f_null[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_f_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_fm_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_fm_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_fm_null[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix-Mobile')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_fm_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'Fix-Mobile')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_if_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet-Fix')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_if_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet-Fix')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_if_null[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet-Fix')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_if_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'Internet-Fix')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_unk_fav[$i] = Fiche::where('type', 'OCC')->where('service', 'neon')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_unk_defav[$i] = Fiche::where('type', 'OCC')->where('service', 'neon')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_unk_null[$i] = Fiche::where('type', 'OCC')->where('service', 'neon')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_unk_annule[$i] = Fiche::where('type', 'OCC')->where('service', 'neon')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();

            $occ_fav[$i] = Fiche::where('type', 'OCC')->where('avis_nv2', 'Favorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_defav[$i] = Fiche::where('type', 'OCC')->where('avis_nv2', 'Defavorable')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_null[$i] = Fiche::where('type', 'OCC')->where('avis_nv2', NULL)->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
            $occ_annule[$i] = Fiche::where('type', 'OCC')->where('avis_nv2', 'Annulé')->whereMonth('date_ajout',  $i)->orderby('created_at', 'desc')->count();
        }



        return view('stats', compact(
            'internet',
            'mobile',
            'fix',
            'internetfix',
            'fixmobile',
            'unk',
            'annee',
            'degrevement',
            'degrevement_m',
            'degrevement_i',
            'degrevement_f',
            'degrevement_if',
            'degrevement_fm',
            'degrevement_i_fav',
            'degrevement_i_defav',
            'degrevement_i_null',
            'degrevement_i_annule',
            'degrevement_m_fav',
            'degrevement_m_defav',
            'degrevement_m_null',
            'degrevement_m_annule',
            'degrevement_f_fav',
            'degrevement_f_defav',
            'degrevement_f_null',
            'degrevement_f_annule',
            'degrevement_if_fav',
            'degrevement_if_defav',
            'degrevement_if_null',
            'degrevement_if_annule',
            'degrevement_fm_fav',
            'degrevement_fm_defav',
            'degrevement_fm_null',
            'degrevement_fm_annule',
            'degrevement_unk_fav',
            'degrevement_unk_defav',
            'degrevement_unk_null',
            'degrevement_unk_annule',
            'degrevement_fav',
            'degrevement_defav',
            'degrevement_null',
            'degrevement_annule',

            'ajustement',
            'ajustement_m',
            'ajustement_i',
            'ajustement_f',
            'ajustement_if',
            'ajustement_fm',
            'ajustement_i_fav',
            'ajustement_i_defav',
            'ajustement_i_null',
            'ajustement_i_annule',
            'ajustement_m_fav',
            'ajustement_m_defav',
            'ajustement_m_null',
            'ajustement_m_annule',
            'ajustement_f_fav',
            'ajustement_f_defav',
            'ajustement_f_null',
            'ajustement_f_annule',
            'ajustement_if_fav',
            'ajustement_if_defav',
            'ajustement_if_null',
            'ajustement_if_annule',
            'ajustement_fm_fav',
            'ajustement_fm_defav',
            'ajustement_fm_null',
            'ajustement_fm_annule',
            'ajustement_unk_fav',
            'ajustement_unk_defav',
            'ajustement_unk_null',
            'ajustement_unk_annule',
            'ajustement_fav',
            'ajustement_defav',
            'ajustement_null',
            'ajustement_annule',

            'occ',
            'occ_m',
            'occ_i',
            'occ_f',
            'occ_if',
            'occ_fm',
            'degrevement_i_annule',
            'occ_i_fav',
            'occ_i_defav',
            'occ_i_null',
            'occ_i_annule',
            'occ_m_fav',
            'occ_m_defav',
            'occ_m_null',
            'occ_m_annule',
            'occ_f_fav',
            'occ_f_defav',
            'occ_f_null',
            'occ_f_annule',
            'occ_if_fav',
            'occ_if_defav',
            'occ_if_null',
            'occ_if_annule',
            'occ_fm_fav',
            'occ_fm_defav',
            'occ_fm_null',
            'occ_fm_annule',
            'occ_unk_fav',
            'occ_unk_defav',
            'occ_unk_null',
            'occ_unk_annule',
            'occ_fav',
            'occ_defav',
            'occ_null',
            'occ_annule',
            'rentres',
            'janvier',
            'fevrier',
            'mars',
            'avril',
            'mai',
            'juin',
            'juillet',
            'aout',
            'septembre',
            'octobre',
            'novembre',
            'decembre',
        ));
    }
}
