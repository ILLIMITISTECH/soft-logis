<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Refacturation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RefacturationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $refacturations = Refacturation::where('etat', 'actif')->get();
        return view('admin.refacturation.index', compact('refacturations'));
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
        // dd($request->all());
        DB::beginTransaction();

        try {

            $refacturation = Refacturation::create([
                'uuid' => Str::uuid(),
                'refClient' => $request->refClient,
                'doit' => $request->doit,
                'adresseComplete' => $request->adresseComplete,
                'num_cc' => $request->num_cc,
                'pol' => $request->pol,
                'pod' => $request->pod,
                'regime' => $request->regime,
                'email' => $request->email,

                'designation' => $request->designation,
                'num_Commande' => $request->num_Commande,
                'num_Bl' => $request->num_Bl,
                'navire' => $request->navire,
                'destination' => $request->destination,
                'amateur' => $request->amateur,
                'num_Dossier' => $request->num_Dossier,
                'num_Ot' => $request->num_Ot,
                'volume' => $request->volume,

                // info facturier
                'facturier_uuid' => Auth::user()->uuid,
                'poste_occuper' => $request->poste_occuper,
                'num_facture' => $request->num_facture,
                'date_echeance' => $request->date_echeance,
                'condition_paiement' => $request->condition_paiement,

                'etat' => 'actif',
                'code' => Refgenerate(Refacturation::class, 'Facture', 'code'),
            ])->save();

            if ($refacturation) {

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
