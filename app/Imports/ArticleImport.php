<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Article;

class ArticleImport implements ToModel
{
    /**
    * @param Collection $collection
    */
        public function model(array $row)
    {
        // Define how to create a model from the Excel row data
        $article = new Article;
        $article->uuid = $row[0];
        $article->code = $row[1];
        $article->numero_bon_commande = $row[2];
        $article->numero_serie = $row[3];
        $article->description = $row[4];
        $article->image = $row[5]; 
        $article->marque_uuid = $row[6];
        $article->categorie_uuid = $row[7];
        $article->model_uuid = $row[8];
        $article->famille_uuid = $row[9];
        $article->source_uuid = $row[10];
        $article->entrepot_uuid = $row[11];
        $article->status = $row[12];
        $article->packaging = $row[13]; 
        $article->poid_tonne = $row[14];
        $article->hauteur = $row[15];
        $article->largeur = $row[16];
        $article->volume = $row[17];
        $article->longueur = $row[18];
        $article->price_unitaire = $row[19]; 
        $article->etat = $row[20];

        if($row[0] != null){
        $article->save();
        
        }
    }
    
    
}
