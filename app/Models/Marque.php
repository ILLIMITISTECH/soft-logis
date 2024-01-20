<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable = ([
        'uuid',
        'code',
        'libelle',
        'color',
        'description',
        'etat'
    ]);

    public function articles()
    {
        return $this->hasMany(Article::class, 'marque_uuid', 'uuid');
    }
}
