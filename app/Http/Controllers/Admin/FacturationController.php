<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Facturation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FacturationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestatairesTransports = Company::where(['etat' => 'actif', 'type'=> 'transporteur'])->get();
        $prestatairesTransits = Company::where(['etat' => 'actif', 'type' =>'transitaire'])->get();

        $factures = Facturation::where('etat', 'actif')->get();
        $facture_bon_a_payer = Facturation::where(['etat' => 'actif', 'statut' => 'good_pay'])->get();
        $facture_payer = Facturation::where(['etat' => 'actif', 'statut' => 'payed'])->get();
        $facture_cancel = Facturation::where(['etat' => 'actif', 'statut' => 'cancel'])->get();

        $factureTransport = $factures->sum('montantTotalTtcTransport');
        $factureTransit = $factures->sum('montantTotalTtcTransit');
        $total = $factureTransport + $factureTransit;
        $total_count = $factures->count();

        $factureBonAPayerTransport = $facture_bon_a_payer->sum('montantTotalTtcTransport');
        $factureBonAPayerTransit = $facture_bon_a_payer->sum('montantTotalTtcTransit');
        $total_bon_payer = $factureBonAPayerTransport + $factureBonAPayerTransit;
        $total_bon_count = $facture_bon_a_payer->count();

        $facturePayerTransport = $facture_payer->sum('montantTotalTtcTransport');
        $facturePayerTransit = $facture_payer->sum('montantTotalTtcTransit');
        $total_payed = $facturePayerTransport + $facturePayerTransit;
        $total_payed_count = $facture_payer->count();

        $factureCancelTransport = $facture_cancel->sum('montantTotalTtcTransport');
        $factureCancelTransit = $facture_cancel->sum('montantTotalTtcTransit');
        $total_cancel = $factureCancelTransport + $factureCancelTransit;
        $total_cancel_count = $facture_cancel->count();


        return view('admin.facturation.index', compact('prestatairesTransports','factures','total', 'total_count', 'facture_bon_a_payer', 'total_bon_payer', 'total_bon_count', 'total_payed', 'total_payed_count', 'total_cancel', 'total_cancel_count', 'prestatairesTransits'));
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
                'numFacture' => 'required|string|max:255',
            ]);

            $totalHtTransit = $request->montantHtDouane + $request->montantHtAmat + $request->montantHtAccor + $request->montantHtPres + $request->montantHtAutre;

            $montantTotalTtcTransit = $request->montantTtcDouane + $request->montantTtcAmat + $request->montantTtcAccor + $request->montantTtcPres + $request->montantTtcAutre;

            $tvaGlobal = $montantTotalTtcTransit - $totalHtTransit;
            $tauxTvaGlobal = 0;
            if ($totalHtTransit != null) {
                $tauxTvaGlobal = ($tvaGlobal / $totalHtTransit) * 100;
            }

            $totalHtTransport = $request->montantHtTpPres + $request->montantHtTpAutr;
            $totalTtcTransport = $request->montantTtcTpPres + $request->montantTtcTpAutr;
            $tvaGlobalTransport = $totalTtcTransport - $totalHtTransport;

            $tauxTvaGlobalTransport = 0;
            if ($totalHtTransport != null) {
                $tauxTvaGlobalTransport = ($tvaGlobalTransport / $totalHtTransport) * 100;
            }

            DB::beginTransaction();
            try {

                $image= $request->facture_original ?? "";
                if($image == null) {
                 $image= 'default_logo.jpg';
                }else{
                    $file = $request->file('facture_original');
                 //    dd($image);
                    $image = Str::uuid().'.'.$file->getClientOriginalExtension();
                    $file->move('files/',$image);
                }
                $user = auth()->user();

                $saving= Facturation::create([
                    'uuid'=>Str::uuid(),
                    'code' => Refgenerate(Facturation::class, 'Fa', 'code'),
                    'statut' => 'reccording',

                    'numFacture' => $request->numFacture,
                    'date_paiement' => $request->date_paiement,
                    'typeFacture' => $request->typeFacture,

                    'transitaire_uuid' => $request->transitaire_uuid,
                    'montantHtDouane' => $request->montantHtDouane,
                    'tvaDouane' => $request->tvaDouane,
                    'montantTtcDouane' => $request->montantTtcDouane,
                    'montantHtAmat' => $request->montantHtAmat,
                    'tvaAmat' => $request->tvaAmat,
                    'montantTtcAmat' => $request->montantTtcAmat,
                    'montantHtAccor' => $request->montantHtAccor,
                    'tvaAccor' => $request->tvaAccor,
                    'montantTtcAccor' => $request->montantTtcAccor,
                    'montantHtPres' => $request->montantHtPres,
                    'tvaPres' => $request->tvaPres,
                    'montantTtcPres' => $request->montantTtcPres,
                    'montantHtAutre' => $request->montantHtAutre,
                    'tvaAutre' => $request->tvaAutre,
                    'montantTtcAutre' => $request->montantTtcAutre,

                    'transporteur_uuid' => $request->transporteur_uuid,
                    'montantHtTpPres' => $request->montantHtTpPres,
                    'tvaTpPres' => $request->tvaTpPres,
                    'montantTtcTpPres' => $request->montantTtcTpPres,
                    'montantHtTpAutr' => $request->montantHtTpAutr,
                    'tvaTpAutr' => $request->tvaTpAutr,
                    'montantTtcTpAutr' => $request->montantTtcTpAutr,

                    'montantTotalHtTransit' => $totalHtTransit,
                    'montantTotalTtcTransit' => $montantTotalTtcTransit,
                    'TotalTvaTransit' => $tauxTvaGlobal,

                    'montantTotalHtTransport' => $totalHtTransport,
                    'montantTotalTtcTransport' => $totalTtcTransport,
                    'TotalTvaTransport' => $tauxTvaGlobalTransport,

                    'facture_original' => $image,
                    'note' => $request->note,
                    'user_create' => Auth::id(),

                    'etat' => 'actif',
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $facture = Facturation::where('uuid', $id)->first();
        return view('admin.facturation.show', compact('facture'));
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
        {
            DB::beginTransaction();
            try {
                $image= $request->facture_original ?? "";
                if($image == null) {
                 $image= $request->facture_original;
                }else{
                    $file = $request->file('facture_original');
                 //    dd($image);
                    $image = Str::uuid().'.'.$file->getClientOriginalExtension();
                    $file->move('files/',$image);
                }
                $user = auth()->user()->name .' '. auth()->user()->lastname;

                $saving= Facturation::where('uuid', $id)->update([
                    'numFacture' => $request->numFacture,
                    'date_paiement' => $request->date_paiement,

                    'transitaire_uuid' => $request->transitaire_uuid,
                    'montantHtDouane' => $request->montantHtDouane,
                    'tvaDouane' => $request->tvaDouane,
                    'montantTtcDouane' => $request->montantTtcDouane,
                    'montantHtAmat' => $request->montantHtAmat,
                    'tvaAmat' => $request->tvaAmat,
                    'montantTtcAmat' => $request->montantTtcAmat,
                    'montantHtAccor' => $request->montantHtAccor,
                    'tvaAccor' => $request->tvaAccor,
                    'montantTtcAccor' => $request->montantTtcAccor,
                    'montantHtPres' => $request->montantHtPres,
                    'tvaPres' => $request->tvaPres,
                    'montantTtcPres' => $request->montantTtcPres,
                    'montantHtAutre' => $request->montantHtAutre,
                    'tvaAutre' => $request->tvaAutre,
                    'montantTtcAutre' => $request->montantTtcAutre,

                    'transporteur_uuid' => $request->transporteur_uuid,
                    'montantHtTpPres' => $request->montantHtTpPres,
                    'tvaTpPres' => $request->tvaTpPres,
                    'montantTtcTpPres' => $request->montantTtcTpPres,
                    'montantHtTpAutr' => $request->montantHtTpAutr,
                    'tvaTpAutr' => $request->tvaTpAutr,
                    'montantTtcTpAutr' => $request->montantTtcTpAutr,

                    'montantTotalTtc' => $request->montantTotalTtc,
                    'montantTotalHt' => $request->montantTotalHt,

                    'facture_original' => $image,
                    'note' => $request->note,
                    'user_create' => Auth::id(),
                ]);

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Facture modifier avec succes!",
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        {

            DB::beginTransaction();
            try {

                $saving= Facturation::where(['uuid'=>$id])->update(['etat'=>"inactif"]);

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Supprimé avec succes!",
                        'code'=>200,
                    ];
                    DB::commit();
                } else {
                    DB::rollback();
                    $dataResponse =[
                        'type'=>'error',
                        'urlback'=>'',
                        'message'=>"Erreur lors de la suppression!",
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
    public function marck_to_good_pay(string $id)
    {
        {
            DB::beginTransaction();
            try {
                $saving= Facturation::where(['uuid'=>$id])->update(['statut'=>"good_pay"]);

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Marqué comme Bon a Payer avec succes!",
                        'code'=>200,
                    ];
                    DB::commit();
                } else {
                    DB::rollback();
                    $dataResponse =[
                        'type'=>'error',
                        'urlback'=>'',
                        'message'=>"Une erreur ces produite!",
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
    public function marck_payed(string $id)
    {

        {

            DB::beginTransaction();
            try {

                $saving= Facturation::where(['uuid'=>$id])->update(['statut'=>"payed"]);

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Paiement effectué avec succes!",
                        'code'=>200,
                    ];
                    DB::commit();
                } else {
                    DB::rollback();
                    $dataResponse =[
                        'type'=>'error',
                        'urlback'=>'',
                        'message'=>"Une erreur ces produite!",
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
    public function marck_canceled(string $id)
    {

        {

            DB::beginTransaction();
            try {

                $saving= Facturation::where(['uuid'=>$id])->update(['statut'=>"cancel"]);

                if ($saving) {

                    $dataResponse =[
                        'type'=>'success',
                        'urlback'=>"back",
                        'message'=>"Paiement effectué avec succes!",
                        'code'=>200,
                    ];
                    DB::commit();
                } else {
                    DB::rollback();
                    $dataResponse =[
                        'type'=>'error',
                        'urlback'=>'',
                        'message'=>"Une erreur ces produite!",
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
}
