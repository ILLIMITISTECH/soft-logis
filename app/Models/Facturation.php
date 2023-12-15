<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\PrestationLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facturation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'code',
        'etat',
        'statut',
        'numFacture',
        'date_paiement',
        'typeFacture',
        'transitaire_uuid',
        'montantHtDouane',
        'tvaDouane',
        'montantTtcDouane',
        'montantHtAmat',
        'tvaAmat',
        'montantTtcAmat',
        'montantHtAccor',
        'tvaAccor',
        'montantTtcAccor',
        'montantHtPres',
        'tvaPres',
        'montantTtcPres',
        'montantHtAutre',
        'tvaAutre',
        'montantTtcAutre',

        'transporteur_uuid',
        'montantHtTpPres',
        'tvaTpPres',
        'montantTtcTpPres',
        'montantHtTpAutr',
        'tvaTpAutr',
        'montantTtcTpAutr',

        'montantTotalHtTransit',
        'montantTotalTtcTransit',
        'TotalTvaTransit',

        'montantTotalHtTransport',
        'montantTotalTtcTransport',
        'TotalTvaTransport',

        'num_blTransit',
        'file_BlTransit',

        'num_blTransport',
        'file_BlTransport',

        'facture_original',
        'note',
        'user_create',
        'user_payed',
    ];

    protected $dates = ['date_paiement'];

    public function transporteur()
    {
        return $this->belongsTo(Company::class, 'transporteur_uuid', 'uuid');
    }
    public function transitaire()
    {
        return $this->belongsTo(Company::class, 'transitaire_uuid', 'uuid');
    }

    public function create_By()
    {
        return $this->belongsTo(User::class, 'user_create');
    }


    public function payed_by()
    {
        return $this->belongsTo(User::class, 'user_payed');
    }

}
