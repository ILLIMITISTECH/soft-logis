<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'logo',
        'code',
        'type', //organisation transit transport Clients  et etc
        'voie_transport',
        'identification', //registre de commerce
        'raison_sociale',
        'email',
        'phone',
        'localisation',
        'description',
        'etat',
        'contact_one_name',
        'contact_one_lastName',
        'contact_one_email',
        'contact_two_name',
        'contact_two_lastName',
        'contact_two_email',
    ];
}
