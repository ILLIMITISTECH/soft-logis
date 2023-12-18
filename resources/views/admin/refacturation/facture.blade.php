<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <title>SoftLogis : Refacturation</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
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
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
                                                <img src="{{ asset('assets/images/logo_jalo.jpg') }}" style="width:100px" class="logo-icon" alt="logo icon">
												</a>
                                                
                                                </div>
											<div class="col company-details">
												<h5 class="name">
                                                  <b>N° DE FACTURE</b> :  {{ $refacturation->num_facture ?? 'N/A' }}
								                </h5>
												<div><b>DATE</b> : {{ $refacturation->date_payed ?? 'N/A' }}</div>
												<div><b>RÉF CLIENT</b> : {{ $refacturation->refClient ?? 'N/A' }}</div>
                                                <br><br>
                                                <div class="col company-details">
                                                    <h5 class="name">
                                                    <b>DOIT</b> :  {{ $refacturation->doit ?? 'N/A' }}
                                                    </h5>
                                                    <div><b>ADRESSE COMPLETE</b> : {{ $refacturation->adresseComplete ?? 'N/A' }}</div>
                                                    <div><b>N° CC</b> : {{ $refacturation->num_cc ?? 'N/A' }}</div>
                                                </div>
											</div>
										</div>
                                            <br><br>
                                        <div class="row">
											<div class="col-lg-12">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
											</div>
											<div class="col-lg-4 company-details">
												<div class="name" style="text-align: left;">
                                                  <b>DÉSIGNATION</b> :  {{ $refacturation->designation ?? 'N/A' }}
								                </div>
												<div style="text-align: left;"><b>N° COMMANDE</b> : {{ $refacturation->num_Commande ?? 'N/A' }}</div>
                                                <br>
												<div style="text-align: left;"><b>N° BI</b> : {{ $refacturation->num_BI ?? 'N/A' }}</div>
                                                <br>
                                                <div style="text-align: left;"><b>NAVIRE/VOYAGE</b> : {{ $refacturation->navire ?? 'N/A' }}</div>
												<div style="text-align: left;"><b>DESTINATON</b> : {{ $refacturation->destination ?? 'N/A' }}</div>
											</div>
                                            <div class="col-lg-4 company-details">
												<div class="name" style="text-align: left;">
                                                  <b>AMATEUR</b> :  {{ $refacturation->amateur ?? 'N/A' }}
								                </div>
												<div style="text-align: left;"><b>N° DOSSIER</b> : {{ $refacturation->num_Dossier ?? 'N/A' }}</div>
                                                <br>
												<div style="text-align: left;"><b>N° OT</b> : {{ $refacturation->num_Ot ?? 'N/A' }}</div>
                                                <br>
												<div style="text-align: left;"><b>VOLUME/POIDS</b> : {{ $refacturation->volume ?? 'N/A' }}</div>
											</div>
                                            <div class="col-lg-3 company-details">
                                            <div class="to" style="text-align: left;"> <b>POL</b> : {{ $user->pol ?? 'N/A' }}</div>
												<div class="address" style="text-align: left;"> <b>POD</b> : {{ $refacturation->pod ?? 'N/A' }}</div>
												<div class="email" style="text-align: left;"> <b>RÉGIME</b> : {{ $refacturation->regime ?? 'N/A' }}
											</div>
        
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-to">
												<h5 class="to"> <b>ID FACTURIER</b> : {{ $user->name ?? 'N/A' }}</h5>
												<div class="address"> <b>POSTE</b> : {{ $refacturation->poste_occuper ?? 'N/A' }}</div>
												<div class="email"> <b>CONDITIONS DE PAIEMENT</b> : {{ $refacturation->condition_paiement ?? 'N/A' }}
												</div>
                                                <div class="address"> <b>DATE D'ÉCHÉANCE</b> : {{ $refacturation->date_echeance ?? 'N/A' }}</div>
											</div>
										</div>
                                        <br>
										<table>
											<thead>
												<tr>
													<th>#</th>
													<th class="text-left">DESCRIPTION</th>
													<th class="text-right">PRIX UNITAIRE</th>
													<th class="text-right">QTE</th>
													<th class="text-right">TOTAL</th>
												</tr>
											</thead>
											<tbody>
                                            @forelse ($prestations_debours as $prestations_debour)
												<tr>
													<td class="no">{{ $prestations_debour->id ?? 'N/A'}}</td>
													<td class="text-left">
														<h3>
                                                        <a target="_blank" href="javascript:;">
                                                        {{ $prestations_debour->prestation ?? 'N/A'}}
                                                        </a>
										            </h3>
													{{ $prestations_debour->description ?? 'N/A'  }}</td>
													<td class="unit">{{ $prestations_debour->prixunitaire ?? 'N/A' }}</td>
													<td class="qty">{{ $prestations_debour->qty ?? 'N/A' }}</td>
													<td class="total">{{ $prestations_debour->total ?? 'N/A' }} XOF</td>
												</tr>
                                                @empty
                                                <tr>Aucune prestation enregistré</tr>
                                            @endforelse
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">SOUS TOTAL DEBOURS</td>
													<td>{{ number_format($prestations_totals_debours)}} XOF</td>
												</tr>

                                                @forelse ($prestations as $item )
												<tr>
													<td class="no">{{ $item->id ?? 'N/A'}}</td>
													<td class="text-left">
														<h3>
                                                        <a target="_blank" href="javascript:;">
                                                        {{ $item->prestation ?? 'N/A'}}
                                                        </a>
										            </h3>
													{{ $item->description ?? 'N/A'  }}</td>
													<td class="unit">{{ $item->prixunitaire ?? 'N/A' }}</td>
													<td class="qty">{{ $item->qty ?? 'N/A' }}</td>
													<td class="total">{{ $item->total ?? 'N/A' }} XOF</td>
												</tr>
                                                @empty
                                                <tr>Aucune prestation enregistré</tr>
                                            @endforelse

                                                <tr>
													<td colspan="2"></td>
													<td colspan="2">SOUS TOTAL DE PRESTATION</td>
													<td>{{ number_format($prestations_totals)}} XOF</td>
												</tr>

                                                <tr>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td></td>
												</tr>

                                                <tr>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td></td>
												</tr>

												<tr>
													<td colspan="2"></td>
													<td colspan="2">TVA</td>
													<td>{{ number_format($tva)}}</td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td colspan="2">TOTAL HT</td>
													<td>{{ number_format($total_ht)}}</td>
												</tr>
                                                <tr>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td></td>
												</tr>
                                                <tr>
													<td colspan="2"></td>
													<td colspan="2">TOTAL XOF</td>
													<td>{{ number_format($total_xof)}} XOOF</td>
												</tr>
											</tfoot>
										</table>
										<!--<div class="thanks">Thank you!</div>
										<div class="notices">
											<div>NOTICE:</div>
											<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
										</div>-->
									</main>
									<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
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