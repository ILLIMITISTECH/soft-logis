<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Sourcing;
use Illuminate\View\View;
use App\Models\Expedition;
use App\Models\OdTransite;
use App\Models\Facturation;
use App\Models\OdLivraison;
use App\Models\stockUpdate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        // Date actuel
        $today = Carbon::now();

        $firstDayOfMonth = $today->firstOfMonth()->format('Y-m-d H:i:s');
        $lastDayOfMonth = $today->lastOfMonth()->format('Y-m-d H:i:s');

        $firstDayOfWeek = $today->startOfWeek()->format('Y-m-d H:i:s'); // semaine
        $lastDayOfWeek = $today->endOfWeek()->format('Y-m-d H:i:s');


        $stockGlobals = Article::where('etat', 'actif')->get();

        $inFabrication = Article::where(['etat' => 'actif', 'status' => 'enFabrication'])->get();
        $inUsineOut = Article::where(['etat' => 'actif', 'status' => 'sortiUsine'])->get();
        $inWaitExpediteImport = Article::where(['etat' => 'actif', 'status' => 'enExpedition'])->get();
        $arrivagePod = Article::where(['etat' => 'actif', 'status' => 'arriverAuPod'])->get();
        $receivStock = Article::where(['etat' => 'actif', 'status' => 'stocked'])->get();
        $inWaitExpediteExport = Article::where(['etat' => 'actif', 'status' => 'expEnCours'])->get();
        $liverExpedite = Article::where(['etat' => 'actif', 'status' => 'delivered'])->get();

        // qty stock previsionnel

        $stockPreview = $inFabrication->count() + $inUsineOut->count() + $inWaitExpediteImport->count() + $arrivagePod->count();
        $stockPreviewValue = $inFabrication->sum('price_unitaire') + $inUsineOut->sum('price_unitaire') + $inWaitExpediteImport->sum('price_unitaire') + $arrivagePod->sum('price_unitaire');

        // Date recente du prochain arriver de produit

        $nextArrive = Sourcing::where('etat', 'actif')
        ->whereNotIn('statut', ['stocked'])
        ->orderBy('date_arriver', 'desc')
        ->get();

        $firstNextArrivage = Sourcing::where(['etat' => 'actif'])
        ->whereNotIn('statut', ['stocked'])
        ->orderBy('date_arriver', 'desc')->first();

        // dd($firstNextArrivage);




        $avgPerExpedite = Sourcing::where(['etat' => 'actif'])
            ->with('products') // Charger les produits associés à chaque expédition
            ->get();

        // Calculer la moyenne du nombre de produits par expédition
        $nbrProdPerExpedition = $avgPerExpedite->avg(function ($expedition) {
            return $expedition->products->count();
        });




        // Reporting sur les entré de stock pour le mois And Semaine Conformity integré
        $InStock = stockUpdate::where(['mouvement' => 'In'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

        $conformInStock = stockUpdate::where([
            'mouvement' => 'In',
            'conformity' => 'on'
        ])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
        $noConformInStock = stockUpdate::where([
            'mouvement' => 'In',
            'conformity' => 'off'
        ])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

        // hebdomadaire

         // Requête pour obtenir les produits en stock pour la semaine en cours
        $InStockWekly = stockUpdate::where(['mouvement' => 'In'])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

        $conformInStockWeekly = stockUpdate::where([
            'mouvement' => 'In',
            'conformity' => 'on'
        ])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

        $noConformInStockWeekly = stockUpdate::where([
                'mouvement' => 'In',
                'conformity' => 'off'
            ])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();


        $listInStock = stockUpdate::where(['mouvement' => 'In'])
        ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        // Produit sortie du stock par mois et semaine

        $outStockMonth = stockUpdate::where(['mouvement' => 'Out'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

        $totalValue = $outStockMonth->sum(function($item) {
            if ($item->product != null) {
                return $item->product->price_unitaire;
            }
        });


        $outStockWekly = stockUpdate::where([
            'mouvement' => 'Out',
        ])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

        $totalValueWeekly = $outStockWekly->sum(function($item) {
            return $item->product->price_unitaire;
        });


        // Import
        $sourcings = Sourcing::where(['etat' => 'actif'])->orderBy('created_at', 'desc')->get();

        // dd($sourcings);

        $sourcingInValidation = Sourcing::where(['etat' => 'actif', 'statut' => 'validateDoc'])->get();

        $sourcingPerMonths = Sourcing::where(['etat' => 'actif'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

        // dd($lastDayOfMonth);

        $sourcingInValidatPerMonth = Sourcing::where(['etat' => 'actif', 'statut' => 'validateDoc'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
        $sourcingReceive = Sourcing::where(['etat' => 'actif', 'statut' => 'stocked'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
        $sourcingReceivePerWekly = Sourcing::where(['etat' => 'actif', 'statut' => 'stocked'])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

        $sourcingPerWekly = Sourcing::where(['etat' => 'actif'])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

          // Récupérer le nombre total de sourcings
    $nbrTotalSourcings = $sourcings->count();
    $nbrSourcingsPerWekly = $sourcingPerWekly->count();
    $percentageSourcingsPerWekly = ($nbrTotalSourcings !== 0) ? ($nbrSourcingsPerWekly / $nbrTotalSourcings) * 100 : 0;
    // recu par weekly
    $nbrSourcReceivPerWekly = $sourcingReceivePerWekly->count();
    $percentagereceivPerWekly = ($nbrTotalSourcings !== 0) ? ($nbrSourcReceivPerWekly / $nbrTotalSourcings) * 100 : 0;


    $allSourcing = Sourcing::where(['etat' => 'actif'])->get();


    $totalDelaySourcing = 0;

    foreach ($allSourcing as $sourcing) {
        $transitBySourcing = OdTransite::where(['etat' => 'actif', 'sourcing_uuid' => $sourcing->uuid])->first();

        if ($transitBySourcing) {
            $createDateTrSourcing = $transitBySourcing->created_at;
            $totalDelaySourcing += Carbon::parse($sourcing->date_receivFactCom)->diffInDays($createDateTrSourcing);
        } else {
            $totalDelaySourcing += 0; // Ajouter 0 si aucune autre mesure
        }
    }

    if ($allSourcing->count() > 0) {
        $averageDelaySourcing = $totalDelaySourcing / $allSourcing->count();
    } else {
        $averageDelaySourcing = 0;
    }


    // Produit conform per Month
    $nbrTotalInStock = $InStock->count();
    $nbrConformInStock = $conformInStock->count();
    $nbrNoConformInStock = $noConformInStock->count();
    // Calculer le pourcentage de produits conformes par rapport au total des produits reçus
    $percentageConform = ($nbrTotalInStock !== 0) ? ($nbrConformInStock / $nbrTotalInStock) * 100 : 0;

    // Récupérer le nombre total de sourcings
    $nbrTotalSourcings = $sourcings->count();
    $nbrSourcingsPerMonth = $sourcingPerMonths->count();
    $percentageSourcingsPerMonth = ($nbrTotalSourcings !== 0) ? ($nbrSourcingsPerMonth / $nbrTotalSourcings) * 100 : 0;


    $sourcInWaitLivrPerMonth = Sourcing::where(['etat' => 'actif', 'statut' => 'waitLivraison'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $sourcInWaitLivrPerWekly = Sourcing::where(['etat' => 'actif', 'statut' => 'waitLivraison'])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

    // Récupérer le nombre total de sourcings
    // $nbrTotalSourcings = $sourcings->count();
    $nbrWaitSourcingsPerWekly = $sourcInWaitLivrPerWekly->count();
    $percWaitSourPerWekly = ($nbrTotalSourcings !== 0) ? ($nbrWaitSourcingsPerWekly / $nbrTotalSourcings) * 100 : 0;

    $nbrSourcWaitLivr = $sourcInWaitLivrPerMonth->count();

    $percenSourcWaitLivrPerMonth = ($nbrSourcingsPerMonth !== 0) ? ($nbrSourcWaitLivr / $nbrSourcingsPerMonth) * 100 : 0;

    $sourcingReceivPerMonth = $sourcingReceive->count();
    $percenReceivMonth = ($nbrSourcingsPerMonth !== 0) ? ($sourcingReceivPerMonth / $nbrSourcingsPerMonth) * 100 : 0;
    // Ordre transite per Month

    $allTransitPerMonth = OdTransite::where(['etat' => 'actif'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
    $allTransitPerWekly = OdTransite::where(['etat' => 'actif'])->whereBetween('created_at', [$firstDayOfWeek, $lastDayOfWeek])->get();

    $mostUsedTransitaire = OdTransite::where(['etat' => 'actif'])
    ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
    ->groupBy('transitaire_uuid')
    ->selectRaw('transitaire_uuid, count(*) as count')
    ->orderByDesc('count')
    ->first();

    // In
    $nbrTotalIn = $InStock->count();
    $nbrTotalInConform = $conformInStock->count();
    $nbrTotalInNoConfrom = $noConformInStock->count();
    //out
    $nbrTotalOut = $InStockWekly->count();
    $nbrTotalOutConform = $conformInStockWeekly->count();
    $nbrTotalOutNoConfrom = $noConformInStockWeekly->count();

    $allTransit = OdTransite::where(['etat' => 'actif'])->get();
    $totalDelayTransit = 0;

    foreach ($allTransit as $transit) {
        $livraisonBySourcing = OdLivraison::where(['etat' => 'actif', 'sourcing_id' => $sourcing->uuid])->first();

        if ($livraisonBySourcing) {
            $createDateLivSourcing = $livraisonBySourcing->created_at;
            $totalDelayTransit += Carbon::parse($transit->created_at)->diffInDays($createDateLivSourcing);
        } else {
            $totalDelayTransit += 0; // Ajouter 0 si aucune autre mesure
        }
    }

    if ($allTransit->count() > 0) {
        $averageDelayTransit = $totalDelayTransit / $allTransit->count();
    } else {
        $averageDelayTransit = 0;
    }

    $conformInStockGlobal = stockUpdate::where([
        'mouvement' => 'In',
        'conformity' => 'on'
    ])->get();
    $noConformInStockGlobal = stockUpdate::where([
        'mouvement' => 'In',
        'conformity' => 'off'
    ])->get();

    // Export Block Start
    // firstDayOfMonth
    // lastDayOfMonth
    // firstDayOfWeek
    // lastDayOfWeek

    $nbrTotalExpedition = Expedition::where(['etat' => 'actif'])->get();
    $recentExpedition = Expedition::where(['etat' => 'actif'])->orderBy('created_at', 'desc')->limit(5)->get();
    $nbrTotalExpeditionActif = Expedition::where('etat', 'actif')
    ->where('statut', '!=', 'livered')
    ->get();

    $nbrExpeditionToDocValidate = Expedition::where(['etat' => 'actif', 'statut' => 'startedDoc'])->get();
    $nbrExpeditionStarted = Expedition::where(['etat' => 'actif', 'statut' => 'odTransit'])->get(); //To transit
    $nbrExpeditionLivraison = Expedition::where(['etat' => 'actif', 'statut' => 'odTransport'])->get(); //To livraison

     //To transit
    $nbrExpeditionWaitExpedite = Expedition::where(['etat' => 'actif', 'statut' => 'wait_exp'])->get();
    $nbrExpeditionExpedier = Expedition::where(['etat' => 'actif', 'statut' => 'livered'])->get();

    $nbrTotalExpActif = $nbrTotalExpeditionActif->count();
    $countExpWaitDoc = $nbrExpeditionToDocValidate->count();

    if ($nbrTotalExpeditionActif->count() > 0) {
        $percentageExpGlobal = ($nbrTotalExpActif !== 0) ? ($countExpWaitDoc / $nbrTotalExpActif) * 100 : 0;
    } else {
        $percentageExpGlobal = 0;
    }

    if ($nbrTotalExpeditionActif->count() > 0) {
        $percentageExpGlobal = ($nbrTotalExpActif !== 0) ? ($countExpWaitDoc / $nbrTotalExpActif) * 100 : 0;
    } else {
        $percentageExpGlobal = 0;
    }

    // To Started
    $countExpTransit = $nbrExpeditionStarted->count();
    if ($nbrTotalExpeditionActif->count() > 0) {
        $percentageExpTransit = ($nbrTotalExpActif !== 0) ? ($countExpTransit / $nbrTotalExpActif) * 100 : 0;
    } else {
        $percentageExpTransit = 0;
    }
    // To Wait Expedite
    $countExpWaitExpedite = $nbrExpeditionWaitExpedite->count();
    if ($nbrTotalExpeditionActif->count() > 0) {
        $percentageExpWaitExp = ($nbrTotalExpActif !== 0) ? ($countExpWaitExpedite / $nbrTotalExpActif) * 100 : 0;
    } else {
        $percentageExpWaitExp = 0;
    }
    // To Expedition Ready
    $countExpDelivered = $nbrExpeditionExpedier->count();
    if ($nbrTotalExpeditionActif->count() > 0) {
        $percentageExpDelivered = ($nbrTotalExpActif !== 0) ? ($countExpDelivered / $nbrTotalExpActif) * 100 : 0;
    } else {
        $percentageExpDelivered = 0;
    }
    // Export Temps moyen de transit
    $totalDelayExpedite = 0;

    foreach ($nbrTotalExpeditionActif as $expedite) {
        $totalDelayExpedite += Carbon::parse($expedite->date_transit)->diffInDays($expedite->date_transport);
    }
    $averageDelayExpedite = ($nbrTotalExpeditionActif->count() !== 0) ? $totalDelayExpedite / $nbrTotalExpeditionActif->count() : 0;
    //Le plus recent expedition create ...
    $latestExpedition = Expedition::where('etat', 'actif')
    ->where('statut', '!=', 'livered')
    ->orderBy('date_liv', 'asc')
    ->first();


    if ($latestExpedition) {
        $date = Carbon::parse($latestExpedition->date_liv)->diffInDays();
        // $date = Carbon::parse($latestExpedition->date_liv)->diffForHumans();
    } else {
        $date = 0;
    }
    // Construire un libellé personnalisé
    $customLabel = sprintf(
        '%d jours avant livraison',
        $date
    );
    $resultDate = $customLabel;

    // Export Temps moyen de transit
    $totalDelayTransport = 0;

    foreach ($nbrTotalExpeditionActif as $expedite) {
        $totalDelayTransport += Carbon::parse($expedite->date_transport)->diffInDays($expedite->date_destockage);
    }
    $averageDelayTransport = ($nbrTotalExpeditionActif->count() !== 0) ? $totalDelayTransport / $nbrTotalExpeditionActif->count() : 0;

    // Per Month Expedition
    $allExpPerMonth = Expedition::where('etat', 'actif')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();
    $allExpPerMonthActif = Expedition::where(['etat'=> 'actif'])->where('statut', '!=', 'livered')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $allExpWaitValidatePerMonth = Expedition::where(['etat'=> 'actif', 'statut' => 'startedDoc'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $allExpDemarrerPerMonth = Expedition::where(['etat'=> 'actif', 'statut' => 'odTransit'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $allExpWaitingPerMonth = Expedition::where(['etat'=> 'actif', 'statut' => 'wait_exp'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $allExpReadyPerMonth = Expedition::where(['etat'=> 'actif', 'statut' => 'livered'])->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->get();

    $countallExpPerMonthActif = $allExpPerMonthActif->count();

    $countExpWaitDocPerMonth = $allExpWaitValidatePerMonth->count();
    if ($allExpPerMonthActif->count() > 0) {
        $percentageExpWaitDocMensuel = ($countallExpPerMonthActif !== 0) ? ($countExpWaitDocPerMonth / $countallExpPerMonthActif) * 100 : 0;
    } else {
        $percentageExpWaitDocMensuel = 0;
    }

    $countExpDemarrerPerMonth = $allExpDemarrerPerMonth->count();

    if ($allExpPerMonthActif->count() > 0) {
        $percentageExpDemarrerMensuel = ($countallExpPerMonthActif !== 0) ? ($countExpDemarrerPerMonth / $countallExpPerMonthActif) * 100 : 0;
    } else {
        $percentageExpDemarrerMensuel = 0;
    }

    $countExpWaitingPerMonth = $allExpWaitingPerMonth->count();

    if ($allExpPerMonthActif->count() > 0) {
        $percentageExpWaitingMensuel = ($countallExpPerMonthActif !== 0) ? ($countExpWaitingPerMonth / $countallExpPerMonthActif) * 100 : 0;
    } else {
        $percentageExpWaitingMensuel = 0;
    }

    $countExpReadyPerMonth = $allExpReadyPerMonth->count();

    if ($allExpPerMonthActif->count() > 0) {
        $percentageExpReadyMensuel = ($countallExpPerMonthActif !== 0) ? ($countExpReadyPerMonth / $countallExpPerMonthActif) * 100 : 0;
    } else {
        $percentageExpReadyMensuel = 0;
    }

    // Block Finance facture
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





        return view('admin.dashbord',
        compact('stockGlobals', 'inFabrication', 'inUsineOut', 'inWaitExpediteImport', 'arrivagePod', 'receivStock', 'inWaitExpediteExport', 'liverExpedite','stockPreview','stockPreviewValue', 'firstNextArrivage', 'InStock', 'conformInStock', 'noConformInStock', 'conformInStockWeekly', 'noConformInStockWeekly', 'InStockWekly', 'firstDayOfWeek', 'lastDayOfWeek', 'listInStock', 'outStockMonth', 'outStockWekly', 'totalValue', 'totalValueWeekly', 'nextArrive', 'nbrProdPerExpedition', 'sourcings', 'averageDelaySourcing', 'sourcingInValidation', 'sourcingInValidatPerMonth', 'sourcingPerMonths', 'sourcingReceive','percentageConform', 'percentageSourcingsPerMonth','percenSourcWaitLivrPerMonth','percenReceivMonth', 'nbrTotalIn', 'nbrTotalInConform', 'nbrTotalInNoConfrom','nbrTotalOut','nbrTotalOutConform','nbrTotalOutNoConfrom','allTransitPerMonth','mostUsedTransitaire','allTransitPerWekly','nbrExpeditionLivraison', 'averageDelayTransit', 'averageDelayTransport', 'conformInStockGlobal', 'noConformInStockGlobal','sourcingPerWekly','percentageSourcingsPerWekly', 'percWaitSourPerWekly', 'percentagereceivPerWekly', 'sourcingReceivePerWekly', 'nbrExpeditionToDocValidate', 'nbrTotalExpedition', 'nbrExpeditionStarted', 'nbrExpeditionWaitExpedite', 'nbrExpeditionExpedier', 'nbrTotalExpeditionActif', 'percentageExpGlobal', 'percentageExpTransit','percentageExpWaitExp', 'percentageExpDelivered', 'averageDelayExpedite', 'latestExpedition', 'resultDate', 'recentExpedition', 'allExpWaitValidatePerMonth', 'percentageExpWaitDocMensuel', 'percentageExpDemarrerMensuel', 'countExpDemarrerPerMonth', 'countExpWaitingPerMonth', 'percentageExpWaitingMensuel','countExpReadyPerMonth', 'percentageExpReadyMensuel', 'total', 'total_count', 'total_bon_payer', 'total_bon_count', 'total_payed', 'total_payed_count', 'total_cancel', 'total_cancel_count', 'factures'));
        // return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }


}
