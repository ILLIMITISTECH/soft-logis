<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Entrepot;
use App\Models\stockUpdate;
use App\Models\Sourcing_product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EntrepotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $entrepots = Entrepot::where('etat', 'actif')->get();
        return view('admin.entrepot.index', compact('entrepots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // Valider les données du formulaire (libelle, color, etc.)
            $request->validate([
                'nom' => 'required|string|max:255',
                'emplacement' => 'required|string|max:255',
            ]);

            DB::beginTransaction();
            try {

                $saving= Entrepot::create([
                    'uuid'=>Str::uuid(),
                    'nom' => $request->nom,
                    'emplacement' => $request->emplacement,
                    'capacity' => $request->capacity,
                    'color' => $request->color,
                    'description' => $request->description,
                    'etat' => 'actif',
                    'code' => Refgenerate(Entrepot::class, 'ENT', 'code'),
                ])->save();

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Enregistré avec succes!",
                        'code'=>200,
                    ];
                    DB::commit();
               } else {
                    DB::rollback();
                    $dataResponse =[
                        'type'=>'error',
                        'urlback'=>'',
                        'message'=>"Erreur lors de l'enregistrement!",
                        'code'=>500,
                    ];
               }

            } catch (\Throwable $th) {
                DB::rollBack();
                $dataResponse =[
                    'type'=>'error',
                    'urlback'=>'',
                    'message'=>"Erreur systeme! $th",
                    'code'=>500,
                ];
            }
            return response()->json($dataResponse);
        }
    }


    // public function show(string $id)
    // {
    //     $entrepot = Entrepot::where('uuid', $id)->first();

    //     if (!$entrepot) {
    //         return redirect()->route('admin.entrepot.show');
    //     }

    //     $productData = [];
    //     $valeurTotale = 0; // Initialisez la valeur totale à zéro

    //     $stockUpdates = stockUpdate::where('entrepot_uuid', $entrepot->uuid)
    //         ->with('product')
    //         ->get();

    //     // Créez un tableau pour suivre la dernière mise à jour de stock pour chaque produit
    //     $latestUpdates = [];

    //     foreach ($stockUpdates as $update) {
    //         if ($update->product) {
    //             $productId = $update->product->id;

    //             // Vérifiez si c'est la dernière mise à jour pour ce produit
    //             if (!isset($latestUpdates[$productId]) || $update->id > $latestUpdates[$productId]->id) {
    //                 $quantity_initial = $update->product->quantity_initial;
    //                 $latestUpdate = $update;
    //                 $quantityAdded = $latestUpdate->quantity_added;
    //                 $updateDate = $latestUpdate->created_at->diffForHumans();
    //                 $prix = $update->product->price_unitaire; // Prix du produit

    //                 $quantity_removed = $latestUpdate->quantity_removed;
    //                 $mouvement = $latestUpdate->mouvement;

    //                 if (!isset($productData[$productId])) {
    //                     $productData[$productId] = [
    //                         'libelle' => $update->product->libelle,
    //                         'image' => $update->product->image,
    //                         'sale_model' => $update->product->sale_model,
    //                         'quantity_initial' => $quantity_initial,
    //                         'quantity_added' => $quantityAdded,
    //                         'update_date' => $updateDate,
    //                         'price_unitaire' => $prix,
    //                         'quantity_removed' => $quantity_removed,
    //                         'mouvement' => $mouvement,
    //                     ];
    //                 } else {
    //                     $productData[$productId]['quantity_added'] += $quantityAdded;
    //                     $productData[$productId]['update_date'] = $updateDate;
    //                 }

    //                 $valeurArticle = $quantity_initial * $prix;

    //                 $valeurTotale += $valeurArticle;

    //                 // Mettez à jour la dernière mise à jour de stock pour ce produit
    //                 $latestUpdates[$productId] = $latestUpdate;
    //             }
    //         }
    //     }

    //     $totalProducts = count($productData);

    //     return view('admin.entrepot.show', compact('entrepot', 'productData', 'totalProducts', 'valeurTotale', 'stockUpdates'));
    // }
    public function show(string $id)
    {

            $entrepot = Entrepot::where('uuid', $id)->first();


            if ($entrepot) {

                $productsGroupedByFamily = Article::where(['entrepot_uuid'=> $id, 'status' => 'stocked'])
                ->with('familly')
                ->get()
                ->groupBy('familly.libelle');

                // Comptez le nombre total de familles de produits dans cet entrepôt
                $totalFamiliesInEntrepot = $productsGroupedByFamily->count();

                // Récupérez le nombre de produits distincts dans cet entrepôt
                $totalDistinctProductsInEntrepot = Article::where(['entrepot_uuid'=> $id, 'status' => 'stocked'])
                ->distinct('numero_serie')
                ->count();

                $totalAmountInEntrepot = Article::where(['entrepot_uuid'=> $id, 'status' => 'stocked'])->sum('price_unitaire');

                // dd($totalDistinctProductsInEntrepot);
                // Récupérez tous les produits dans cet entrepôt
                $productsInEntrepot = Article::where(['entrepot_uuid'=> $id, 'status' => 'stocked'])->get();

                return view('admin.entrepot.show', compact('productsInEntrepot', 'totalDistinctProductsInEntrepot', 'totalFamiliesInEntrepot', 'totalAmountInEntrepot', 'entrepot'));
            }
    }


    // EntrepotController.php

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
