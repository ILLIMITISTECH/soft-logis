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


            $refacturation_FAC = Refacturation::OrderBy('id', 'desc')->first();

            $prestation = $request->input('prestation');
            $type_prestation = $request->input('type_prestation');
            $qty = $request->input('qty'); 
            $description = $request->input('description'); 
            $prixunitaire = $request->input('prixunitaire');  
            $total = $request->input('total');  
                    
                    for($i=0; $i < count($prestation); $i++){
                    $prestations = [
                        'uuid' => Str::uuid(),
                        'facture_uuid' => $refacturation_FAC->uuid,
                        'etat' => "actif",
                        'prestation' => $prestation[$i],
                        'type_prestation' => $type_prestation[$i],
                        'qty' => $qty[$i],
                        'description' => $description[$i],
                        'prixunitaire' => $prixunitaire[$i],
                        'total' => $total[$i],
                         ];
                     if($prestation[$i] !== null){
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
        $prestations_totals = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');
        $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
        $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
        $total_ht = ($prestations_totals + $prestations_totals_debours);
        $tva = "181893";
        $total_xof = ($total_ht + $tva);

        return view('admin.refacturation.show', compact('total_ht','tva','total_xof','refacturation', 'prestations', 'prestations_totals', 'user', 'prestations_debours','prestations_totals_debours'));

    }

    public function send_facture(Request $request)
    {
       //the facturation
        $refacturation = Refacturation::find($id);
        $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->get();
        $prestations_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->get();
        $prestations_totals = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');
        $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
        $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
        $total_ht = ($prestations_totals + $prestations_totals_debours);
        $tva = "181893";
        $total_xof = ($total_ht + $tva);
  
        //$transporteurName = "fallou.g@illimitis.com";
        $email = $request->get('email');
        Mail::to($email)->send(new Facture($refacturation,$prestations,$prestations_debours,
        $prestations_totals,$prestations_totals_debours,$user,$total_ht,$tva,$total_xof));
        dd("ok");
        return back()->with(['success']);
    }

   
        public function downloadPDF($id) {

                $refacturation = Refacturation::find($id);
                $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->get();
                $prestations_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->get();
                $prestations_totals = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'prestation'])->where(['etat'=>"actif"])->sum('total');
                $prestations_totals_debours = DB::table('facture_prestations')->where(['facture_uuid'=>$refacturation->uuid])->where(['type_prestation'=>'debours'])->where(['etat'=>"actif"])->sum('total');
                $user = DB::table('users')->where(['uuid'=>$refacturation->facturier_uuid])->first();
                $total_ht = ($prestations_totals + $prestations_totals_debours);
                $tva = "181893";
                $total_xof = ($total_ht + $tva);

                $pdf = PDF::loadView('admin.refacturation.facture', compact('total_ht','tva','total_xof','refacturation', 'prestations', 'prestations_totals', 'user', 'prestations_debours','prestations_totals_debours'));
                
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


            $prestation = $request->input('prestation');
            $type_prestation = $request->input('type_prestation');
            $qty = $request->input('qty'); 
            $description = $request->input('description'); 
            $prixunitaire = $request->input('prixunitaire');  
            $total = $request->input('total');  
                    
                    for($i=0; $i < count($prestation); $i++){
                    $prestations = [
                        'uuid' => Str::uuid(),
                        'facture_uuid' => $refacturation_FAC->uuid,
                        'etat' => "actif",
                        'prestation' => $prestation[$i],
                        'type_prestation' => $type_prestation[$i],
                        'qty' => $qty[$i],
                        'description' => $description[$i],
                        'prixunitaire' => $prixunitaire[$i],
                        'total' => $total[$i],
                         ];
                     if($prestation[$i] !== null){
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
}
