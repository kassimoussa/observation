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
        'obs_nv1', 
        'obs_nv2',
        'obs_nv3',
        'submitedby', 
        'type',
        'avis_nv2',
        'avis_nv3',
        'status',
        'service',
        'date_ajout',
        'date_nv2',
        'date_nv3',
        'date_dc',
        'date_clos',
        'assignedto',
        'nivo',
        'trans'
    ];
}
