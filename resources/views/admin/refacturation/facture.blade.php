<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>SoftLogis : Refacturation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .header {
            height: 40px;
            width: 100%;
            padding: 10px 0;
            justify-content: center;
            align-items: center;
            align-self: center;
        }
        .footer {
            height: auto;
            width: 100%;
            justify-content: center;
            align-items: center;
            align-self: center;
        }
        .content-logo {
            display: inline-block;
            flex-direction: row;
            /* justify-content: space-between; */
            align-items: center;
            align-self: center;
            margin-top: 10px;
            padding-left: 20px;
            padding-right: 20px;
            color: #fff;
        }
        .uppercase {
            text-transform: uppercase;
            font-size: 15px;
        }
        .size_12 {
            font-size: 11px;
        }
        .spacer_gap {
            margin-top: 3px;
            margin-bottom: 0px;
            /* border: 1px solid red; */
        }

        tbody td {
            border-bottom: 1px solid #ccc;
        }
        .table td {
            border-bottom: 1px solid #ccc;
        }
         th > div{
            margin-bottom: 3px;
         }

    </style>
</head>

<body>
    <div class="container">
        <!--start page wrapper -->
        <div class="page-content">
            <!--breadcrumb-->

            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div id="invoice">
                        <div class="invoice overflow-auto">
                            <div style="min-width: 600px ;">
                                <div class="header" style="background-color: rgba(0, 0, 0, 0.773);">
                                    <div class="content-o row" style="width: 100% ;margin-bottom: 0px ; padding: 0 10px;">
                                        <div class="col" style="min-width: 100px">
                                            <img src="{{ asset('assets/images/logo_jalo.jpg') }}" style="width:100px" class="logo-icon"
                                            alt="logo icon">
                                        </div>
                                        <div class="col" style="min-width: 200px"><div style="text-transform: uppercase; margin-top: 0;" class="uppercase">jalo Logistics</div>
                                        <p style="margin-top: 0;" class="size_12">La Logistique Autrement</p></div>
                                    </div>
                                    
                                </div>
                                <table style="width:100%; margin: 50px 0 0 0;">
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th class="text-left" style="width: 40%;"></th>
                                            <th class="text-left" style=""></th>
                                            <th class="text-left" style="width: 30%;">
                                                <div style="font-size: 8px;">
                                                    <b style="font-size: 8px; margin: 0;">N° DE FACTURE</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->num_facture ?? 'N/A' }}</span>
                                                </div>
                                                <div style="font-size: 8px; margin: 0;"><b style="font-size: 8px;">DATE</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->created_at->format('d/m/Y') ?? 'N/A' }}</span>
                                                </div>
                                                <div style="font-size: 8px; margin: 0;"><b style="font-size: 8px;">RÉF CLIENT</b> :
                                                    <span
                                                        style="font-size: 8px;">{{ $refacturation->refClient ?? 'N/A' }}</span>
                                                </div>
                                            </th>
                                            <th class="text-left" style="width: 30%;">
                                               
                                                <div style="font-size: 8px;">
                                                    <b style="font-size: 8px;">DOIT</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->doit ?? 'N/A' }}</span>
                                                </div>
                                                <div style="font-size: 8px;"><b style="font-size: 8px;">ADRESSE
                                                        COMPLETE</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->adresseComplete ?? 'N/A' }}</span>
                                                </div>
                                                <div style="font-size: 8px;"><b style="font-size: 8px;">N° CC</b> :
                                                    <span
                                                        style="font-size: 8px;">{{ $refacturation->num_cc ?? 'N/A' }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr style="width: 80% ; margin: 0;">
                                <table style="width:100%; margin-top: 0;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-left" style="height: 100px;">
                                                
                                                <div style="text-align: left; font-size: 8px;"><b
                                                        style="font-size: 8px;">N° COMMANDE</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->num_Commande ?? 'N/A' }}</span>
                                                </div>
                                                <div style="text-align: left; font-size: 8px;"><b
                                                        style="font-size: 8px;">N° BL</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->num_Bl ?? 'N/A' }}</span>
                                                </div>
                                                <div style="text-align: left; font-size: 8px;"><b
                                                    style="font-size: 8px;">N° DOSSIER JALÔ</b> : <span
                                                    style="font-size: 8px;">{{ $refacturation->num_Dossier ?? 'N/A' }}</span>
                                                </div>
                                                <div style="text-align: left; font-size: 8px;"><b
                                                        style="font-size: 8px;">N° OT</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->num_Ot ?? 'N/A' }}</span>
                                                </div>
                                                
                                            </th>
                                            <th class="text-right" style="height: 100px;">
                                                <div style="text-align: left; font-size: 8px;"><b
                                                    style="font-size: 8px;">NAVIRE/VOYAGE</b> : <span
                                                    style="font-size: 8px;">{{ $refacturation->navire ?? 'N/A' }}</span>
                                                </div>
                                                <div style="text-align: left; font-size: 8px;"><b
                                                        style="font-size: 8px;">DESTINATON</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->destination ?? 'N/A' }}</span>
                                                </div>
                                                <div class="name" style="text-align: left; font-size: 8px;">
                                                    <b style="font-size: 8px;">DÉSIGNATION</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->designation ?? 'N/A' }}</span>
                                                </div>
                                                <div style="text-align: left; font-size: 8px;"><b
                                                    >VOLUME/POIDS</b> : <span
                                                    style="font-size: 8px;">{{ $refacturation->volume ?? 'N/A' }}
                                                    kg</span>
                                                </div>
                                            </th>
                                            <th class="text-right" style="height: 100px;">
                                                <div class="name" style="text-align: left; font-size: 8px;">
                                                    <b style="font-size: 8px;">AMATEUR</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->amateur ?? 'N/A' }}</span>
                                                </div>
                                                <div class="to" style="text-align: left; font-size: 8px;"> <b
                                                        style="font-size: 8px;">POL</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->pol ?? 'N/A' }}</span></div>
                                                <div class="address" style="text-align: left; font-size: 8px;"> <b
                                                        style="font-size: 8px;">POD</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->pod ?? 'N/A' }}</span>
                                                </div>
                                                <div class="email" style="text-align: left; font-size: 8px;"> <b
                                                        style="font-size: 8px;">RÉGIME</b> : <span
                                                        style="font-size: 8px;">{{ $refacturation->regime ?? 'N/A' }}</span>
                                                </div>
                                            </th>
                                            <th class="text-right" style="height: 100px; font-size: 8px;"></th>
                                        </tr>
                                    </thead>
                                </table>
                                <hr style="width: 80% ; margin: 0;">
                                <main style="margin-top: 0;">
                                    <div class="container" style="min-width: 100%">
                                        <table class="" style="width: 100%;">
                                            <thead class="uppercase size_12" style="background: #000; color: #fff;">
                                                <tr>
                                                    <th class="id">ID Facturier</th>
                                                    <th class="poste">Poste</th>
                                                    <th class="condition-paiement">Condition de Paiement</th>
                                                    <th class="date-echeance">Date d'échéance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="size_12">
                                                    <td class="id">{{ $user->name.' '.$user->lastname}}</td>
                                                    <td class="poste">{{ $refacturation->poste_occuper ?? 'N/A' }}</td>
                                                    <td class="condition-paiement">{{ $refacturation->condition_paiement ?? 'N/A' }}
                                                    </td>
                                                    <td class="date-echeance">{{ $refacturation->date_echeance ?? 'N/A' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="content-prestation" style="margin-top: 29px;">
                                        <table class="able" style="width: 100%;">
                                            <thead class="uppercase size_12" style="background: #000; color: #fff;">
                                                <tr>
                                                    <th class="id">Nature Prestation</th>
                                                    <th class="poste">QTE</th>
                                                    <th class="condition-paiement">Description</th>
                                                    <th class="date-echeance">Prix Unitaire</th>
                                                    <th class="date-echeance">Total Ligne (XOF)</th>
                                                    <th class="date-echeance">TOTAL (€)</th>
                                                </tr>
                                            </thead>
                                            @php $exchangeRate = 0.00152; @endphp
                                            <tbody style="margin-bottom: 15px">
                                                @forelse ($prestations_debours as $prestations_debour)
                                                <tr class="size_12" style="">
                                                    <td class="id">{{ $prestations_debour->type_prestation ?? 'N/A'}}</td>
                                                    <td class="poste">{{ $prestations_debour->qty ?? 'N/A' }}</td>
                                                    <td class="condition-paiement">{{ $prestations_debour->description ?? 'N/A'  }}</td>
                                                    <td class="date-echeance">{{ $prestations_debour->prixunitaire ?? 'N/A' }}</td>
                                                    <td class="date-echeance">{{ $prestations_debour->total ?? 'N/A' }}</td>
                                                    <td class="date-echeance">{{ $prestations_debour->total * $exchangeRate ?? 'N/A' }}</td>
                                                </tr>
                                                @empty
                                                <tr>Aucune prestation enregistré</tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot style="width: 100% ;">
                                                <tr style="100%">
                                                    <td style="background: #ccc; height: 20px;"><span
                                                            style="font-size: 8px;">SOUS TOTAL DEBOURS</span>
                                                    </td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background:lightgray; height: 20px;"><span
                                                            style="font-size: 8px;">{{ number_format($prestations_totals_debours)}}</span>
                                                    </td>
                                                    <td style="background:lightgray; height: 20px;"><span
                                                            style="font-size: 8px;">{{ number_format($prestations_totals_debours * $exchangeRate)}}</span>
                                                    </td>
                                                </tr>
                                                <hr style="margin-bottom: 15px">
                                                @forelse ($prestations as $item )
												<tr class="table">	
													<td class="unit" style="font-size: 8px;"><span style="font-size: 8px;"> {{ $item->type_prestation ?? 'N/A'}}</span></td>
                                                    <td class="qty" style="font-size: 8px;"><span style="font-size: 8px;">{{ $item->qty ?? 'N/A' }}</span></td>
													<td class="unit" style="font-size: 8px;"><span style="font-size: 8px;">{{ $item->description ?? 'N/A'  }}</span></td>
													<td class="unit" style="font-size: 8px;"><span style="font-size: 8px;">{{ $item->prixunitaire ?? 'N/A' }}</span></td>
													
													<td class="total" style="font-size: 8px;"><span style="font-size: 8px;">{{ $item->total ?? 'N/A' }}</span></td>
													<td class="total" style="font-size: 8px;"><span style="font-size: 8px;">{{ $item->total * $exchangeRate ?? 'N/A' }}</span></td>
												</tr>
                                                @empty
                                                <tr>Aucune prestation enregistré</tr>
                                            	@endforelse

                                                <tr style="100% ;">
                                                    <td style="background: #ccc; height: 20px;"><span
                                                            style="font-size: 8px;">SOUS TOTAL DE PRESTATION</span>
                                                    </td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background: #ccc; height: 20px;"></td>
                                                    <td style="background:lightgray; height: 20px;"><span
                                                            style="font-size: 8px;">{{ number_format($prestations_totals)}}</span>
                                                    </td>
                                                    <td style="background:lightgray; height: 20px;"><span
                                                            style="font-size: 8px;">{{ number_format($prestations_totals * $exchangeRate)}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td></td>
												</tr>

												<tr>
													<td colspan="2"></td>
													<td colspan="2" style="20px; font-size: 8px;"><span style="font-size: 8px;">TVA</span></td>
													<td style="height: 20px; font-size: 8px;"><span style="font-size: 8px;">{{ number_format($tva)}}</span></td>
													<td style="height: 20px; font-size: 8px;"><span style="font-size: 8px;">{{ number_format($tva * $exchangeRate)}}</span></td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2" style="height: 20px; font-size: 8px;"><span style="font-size: 8px;">TOTAL HT</span></td>
													<td style="height: 20px; font-size: 8px;"><span style="font-size: 8px;">{{ number_format($total_ht)}}</span></td>
													<td style="height: 20px; font-size: 8px;"><span style="font-size: 8px;">{{ number_format($total_ht * $exchangeRate)}}</span></td>
												</tr>
                                                <tr>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td></td>
												</tr>
                                                <tr style="padding-left: 10px">
													<td colspan="2"></td>
													<td colspan="2" style="height: 20px; font-size: 8px; background: #000; color: #fff"><span style="font-size: 8px;">TOTAL XOF</span></td>
													<td style=" height: 20px; font-size: 8px; background: #000; color: #fff"><span style="font-size: 8px;">{{ number_format($total_xof)}}</span></td>
													<td style=" height: 20px; font-size: 8px; background: #000; color: #fff"><span style="font-size: 8px;">{{ number_format($total_xof * $exchangeRate)}}</span></td>

												</tr>
                                                
                                            </tfoot>
                                        </table>
                        
                                        
                                    </div>
                                    
                                    <hr>
                                    <br>
                                    <div class="container" style="margin-top: 15px; width: 100%;    ">
                                        <div class="footer size_12" style="background-color: rgba(0, 0, 0, 0.773);" >
                                            <div class="content-logo row size_12" style="padding: 0 10px; display: flex; justify-content: center; align-items: center; align-self: center; text-align: center;">
                                                01BP 8169 ABIDJAN 01, COCODY Deux Plateaux Rue des Jardins, Cote d'ivoire. SAS au capital de 200 000 000 CFA
                                                Régime d'imposition : Réel Normal Direction des Grandes Entreprises. (DGE), RCCM N° CI-ABJ-03-2023-B16-00087
                                                COFINA N° CI201 01001 109046290985 21 ECOBANK CI93 CI05 9010 5612 1686 9560 0148
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end page wrapper -->
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
