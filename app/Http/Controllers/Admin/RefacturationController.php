<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Refacturation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\Facture;
use Mail;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;

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
                'tva' => $request->tva,

                // info facturier
                'facturier_uuid' => Auth::user()->uuid,
                'poste_occuper' => $request->poste_occuper,
                'num_facture' => $request->num_facture,
                'date_echeance' => $request->date_echeance,
                'condition_paiement' => $request->condition_paiement,

                'etat' => 'actif',
                'code' => Refgenerate(Refacturation::class, 'Facture', 'code'),
            ])->save();


            $refacturation_FAC = Refacturation::OrderBy('id', 'desc')->first();

            //$prestation = $request->input('prestation');
            $type_prestation = $request->input('type_prestation');
            $qty = $request->input('qty');
            $description = $request->input('description');
            $prixunitaire = $request->input('prixunitaire');
            $total = $request->input('total');

                    for($i=0; $i < count($type_prestation); $i++){
                    $prestations = [
                        'uuid' => Str::uuid(),
                        'facture_uuid' => $refacturation_FAC->uuid,
                        'etat' => "actif",
                        //'prestation' => $prestation[$i],
                        'type_prestation' => $type_prestation[$i],
                        'qty' => $qty[$i],
                        'description' => $description[$i],
                        'prixunitaire' => $prixunitaire[$i],
                        'total' => $total[$i],
                         ];
                     if($type_prestation[$i] !== null){
                            DB::table('facture_prestations')->insert($prestations);

                        }
                    }

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

        $refacturation = Refacturation::where(['uuid'=>$id])->firstOrFail();

        $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->get();
        $prestations_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->get();
        $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
        $com = 1.95;
        $comm_debours = $prestations_totals_debours * $com;
        $comm_sous_debours = ($comm_debours / 100);

        $tvaPerCent = $refacturation->tva;

        $prestations_totalsS = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');

        $prestations_totals = $prestations_totalsS + $comm_sous_debours;

        $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
        $total_ht = ($prestations_totals + $prestations_totals_debours);
        // $tva = "21175";

        $tva = ($prestations_totalsS * $tvaPerCent) / 100;
        $total_xof = ($total_ht + $tva);



        return view('admin.refacturation.show', compact('comm_sous_debours','total_ht','tva','total_xof','refacturation', 'prestations', 'prestations_totals', 'user', 'prestations_debours','prestations_totals_debours'));

    }

    public function send_facture($id)
    {
       //the facturation
       //DB::beginTransaction();

      // try {

        $refacturation = Refacturation::find($id);

        $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->get();
        $prestations_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->get();
        $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
        $com = 1.95;
        $comm_debours = $prestations_totals_debours * $com;
        $comm_sous_debours = ($comm_debours / 100);
        $prestations_totalsS = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');
        $prestations_totals = $prestations_totalsS + $comm_sous_debours;

        $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
        $total_ht = ($prestations_totals + $prestations_totals_debours);
        $tvaPerCent = $refacturation->tva;
        $tva = ($prestations_totalsS * $tvaPerCent) / 100;
        $total_xof = ($total_ht + $tva);

        //$transporteurName = "fallou.g@illimitis.com";
        //$email = $request->get('email');
       // dd($refacturation->email);
        if($refacturation->email)
        {
            Mail::to($refacturation->email)->send(new Facture($comm_sous_debours,$refacturation,$prestations,$prestations_debours,
            $prestations_totals,$prestations_totals_debours,$user,$total_ht,$tva,$total_xof));
            dd("ok");
        }

        if ($refacturation->email) {

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


        return back()->with(['success']);
    }


        public function downloadPDF($id) {

                $refacturation = Refacturation::find($id);
                $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->get();
                $prestations_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->get();
                $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
                $com = 1.95;
                $comm_debours = $prestations_totals_debours * $com;
                $comm_sous_debours = ($comm_debours / 100);
                $prestations_totalsS = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');
                $prestations_totals = $prestations_totalsS + $comm_sous_debours;

                $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
                $total_ht = ($prestations_totals + $prestations_totals_debours);
                $tvaPerCent = $refacturation->tva;
                $tva = ($prestations_totalsS * $tvaPerCent) / 100;
                $total_xof = ($total_ht + $tva);

                $pdf = PDF::loadView('admin.refacturation.facture', compact('comm_sous_debours','total_ht','tva','total_xof','refacturation', 'prestations', 'prestations_totals', 'user', 'prestations_debours','prestations_totals_debours'));

                return $pdf->download('refacturation.pdf');
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

        DB::beginTransaction();

        try {

                $refacturation= Refacturation::where('uuid', $id)->update([
               // 'uuid' => Str::uuid(),
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
                'tva' => $request->tva,

                // info facturier
                'facturier_uuid' => Auth::user()->uuid,
                'poste_occuper' => $request->poste_occuper,
                'num_facture' => $request->num_facture,
                'date_echeance' => $request->date_echeance,
                'condition_paiement' => $request->condition_paiement,

               // 'etat' => 'actif',
               // 'code' => Refgenerate(Refacturation::class, 'Facture', 'code'),
            ]);


            $refacturation_FAC = Refacturation::orderBy('updated_at', 'desc')->first();


            DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation_FAC->uuid])->update(['etat'=>"inactif"]);


           // $prestation = $request->input('prestation');
            $type_prestation = $request->input('type_prestation');
            $qty = $request->input('qty');
            $description = $request->input('description');
            $prixunitaire = $request->input('prixunitaire');
            $total = $request->input('total');

                    for($i=0; $i < count($type_prestation); $i++){
                    $prestations = [
                        'uuid' => Str::uuid(),
                        'facture_uuid' => $refacturation_FAC->uuid,
                        'etat' => "actif",
                        //'prestation' => $prestation[$i],
                        'type_prestation' => $type_prestation[$i],
                        'qty' => $qty[$i],
                        'description' => $description[$i],
                        'prixunitaire' => $prixunitaire[$i],
                        'total' => $total[$i],
                         ];
                     if($type_prestation[$i] !== null){
                            DB::table('facture_prestations')->insert($prestations);

                        }
                    }

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        {

            DB::beginTransaction();
            try {
                $fact= Refacturation::where(['uuid'=>$id])->first();
                $saving= Refacturation::where(['uuid'=>$id])->update(['etat'=>"inactif"]);
                DB::table('facture_prestations')->where(['facture_uuid'=>$fact->uuid])->update(['etat'=>"inactif"]);


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

    public function marckToSend(string $id)
    {

        DB::beginTransaction();
        try {
            $sending = Refacturation::where(['uuid'=>$id])->update(['statut' => 'sendToClient']);


            if ($sending) {

                $dataResponse =[
                    'type'=>'success',
                    'urlback'=>"back",
                    'message'=>"Facture envoyée avec succes!",
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
    public function marckToPayed(string $id)
    {

        DB::beginTransaction();
        try {
            $sending = Refacturation::where(['uuid'=>$id])->update(['statut' => 'payed']);


            if ($sending) {

                $dataResponse =[
                    'type'=>'success',
                    'urlback'=>"back",
                    'message'=>"Facture Marqué comme payé avec succes!",
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
    public function marckToConceled(string $id)
    {

        DB::beginTransaction();
        try {
            $sending = Refacturation::where(['uuid'=>$id])->update(['statut' => 'canceled']);


            if ($sending) {

                $dataResponse =[
                    'type'=>'success',
                    'urlback'=>"back",
                    'message'=>"Facture Marqué comme annullé avec succes!",
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
