<?php

namespace App\Models;

use App\Models\Entrepot;
use App\Models\stockUpdate;
use App\Models\ArticleModel;
use App\Models\ArticleFamily;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

   protected $fillable = [
    'uuid',
    'code',
    'numero_bon_commande',
    'numero_serie',
    'description',
    'image',
    'marque_uuid',
    'categorie_uuid',
    'famille_uuid',
    'model_uuid',
    'source_uuid',
    'entrepot_uuid',
    'status',
    'packaging',
    'poid_tonne',
    'hauteur',
    'largeur',
    'volume',
    'longueur',
    'price_unitaire',
    'etat',
    'is_AddSourcing',
    'is_destock'
   ];

   /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function category(): BelongsTo
   {
       return $this->belongsTo(Category::class, 'categorie_uuid', 'uuid');
   }
   public function model(): BelongsTo
   {
       return $this->belongsTo(ArticleModel::class, 'model_uuid', 'uuid');
   }
   public function familly(): BelongsTo
   {
       return $this->belongsTo(ArticleFamily::class, 'famille_uuid', 'uuid');
   }
   public function marque(): BelongsTo
   {
       return $this->belongsTo(Marque::class, 'marque_uuid', 'uuid');
   }
   public function ship_source(): BelongsTo
   {
       return $this->belongsTo(Source::class, 'source_uuid', 'uuid');
   }

   public function stockUpdates()
   {
       return $this->hasMany(stockUpdate::class, 'product_id');
   }

   public function entrepot()
    {
        return $this->belongsTo(Entrepot::class, 'entrepot_uuid', 'uuid');
    }

}
