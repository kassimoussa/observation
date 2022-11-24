<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_time',
        'nom_client', 
        'adresse_client', 
        'num_compte',
        'num_facture',
        'mont_facture', 
        'type',
        'service',
        'submitedby', 
        'obs_nv1', 
        'obs_nv2',
        'obs_nv3',
        'avis_nv2',
        'avis_nv3',
        'status',
        'date_ajout',
        'date_nv2',
        'date_nv3',
        'date_dc',
        'date_dg',
        'date_dsi',
        'date_clos',
        'assignedto',
        'nivo',
        'trans',
        'resendto',
        'message',
        'motif_dsi',
        'com_dsi',
    ];  
}
