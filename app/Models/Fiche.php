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
        'obs_cs_facturation', 
        'obs_cd_si',
        'subimtby',
        'date_ajout',
        'type',
        'status',
        'service',
    ]; 
}
