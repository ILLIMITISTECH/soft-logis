@extends('admin.layouts.admin')
@section('section')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Facturation</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print row">
                    <div class="col-sm-12 col-md-6 col-lg-6 text-start">

                            @if ($facture->statut == 'reccording')
                                <div class="badge rounded-pill text-white bg-secondary py-2 size_14 text-uppercase px-3">
                                    <i class='bx bxs-circle me-1'></i> Enregistrement
                                </div>
                            @endif
                            @if ($facture->statut == 'good_pay')
                                <div class="badge rounded-pill text-info bg-light-info py-2 size_14 text-uppercase px-3">
                                    <i class='bx bxs-circle me-1'></i> Bon à Payé
                                </div>
                            @endif
                            @if ($facture->statut == 'payed')
                                <div class="badge rounded-pill text-success bg-light-success py-2 size_14 text-uppercase px-3">
                                    <i class='bx bxs-circle me-1'></i> Payé
                                </div>
                            @endif
                            @if ($facture->statut == 'cancel')
                                <div class="badge rounded-pill text-danger bg-light-danger py-2 size_14 text-uppercase px-3">
                                    <i class='bx bxs-circle me-1'></i> Rejeter
                                </div>
                            @endif

                    </div>

                    <div class="text-end col-sm-12 col-md-6 col-lg-6">
                        @if ($facture->statut == 'reccording')
                        <div class="size_14 text-uppercase text-center btn">
                            <form action="{{ route('admin.marck_to_good_pay', $facture->uuid) }}" method="post" enctype="multipart/form-data" class="submitForm">
                                @csrf
                                <button type="submit" class="btn btn-primary">Bon à Payer</button>
                            </form>
                        </div>
                        @endif
                        @if ($facture->statut == 'good_pay')
                        @can('Payer Facture')
                        <div class="size_14 text-uppercase btn text-center">
                            <form action="{{ route('admin.marck_payed', $facture->uuid) }}" method="post" enctype="multipart/form-data" class="submitForm mx-0 px-0">
                                @csrf
                                <button type="submit" class="btn btn-success px-3">Payé</button>
                            </form>
                        </div>
                        @endcan
                        @endif
                        @if ($facture->statut !== 'payed')
                        <div class="size_14 text-uppercase text-center btn mx-0 px-0">
                            <form action="{{ route('admin.marck_canceled', $facture->uuid) }}" method="post" enctype="multipart/form-data" class="submitForm">
                                @csrf
                                <button type="submit" class="btn btn-danger custom-button">Rejeter</button>
                            </form>
                        </div>
                        @endif
                        <div class="size_14 text-uppercase btn text-center">
                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#docModal{{ $facture->uuid }}"><i class='bx bxs-file-pdf text-white me-2 font-24' ></i>Facture Original</button>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">

                                        @if ($facture->typeFacture == 'transitaire')
                                        @if ($facture->transporteur != null)
                                        <img src="{{ asset('files/' . $facture->transitaire->logo) }}" width="80" alt="" />
                                        @else
                                            <img src="{{ asset('assets/images/logo.png') }}" width="80" alt="" />
                                        @endif
                                        @elseif ($facture->typeFacture == 'transporteur')
                                            @if ($facture->transporteur != null)
                                                <img src="{{ asset('files/' . $facture->transporteur->logo) }}" width="80" alt="" />
                                            @else
                                                <img src="{{ asset('assets/images/logo.png') }}" width="80" alt="" />

                                            @endif
                                        @endif
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <div class="text-gray-light size_12 my-0 py-0">Enregistrer par:</div>
                                    <h2 class="name">
                                        <a target="" href="javascript:;" class="size_16">
                                            {{ $facture->create_By->name.' '.$facture->create_By->lastname }}
                                        </a>
                                    </h2>
                                    <div>{{ $facture->create_By->email ?? 'N/A' }}</div>
                                    <div>{{ $facture->created_at->diffForHumans() }}</div>

                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">

                                @if ($facture->typeFacture == 'transitaire')
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">Beneficiaire:</div>
                                        <h2 class="to">{{ $facture->transitaire->raison_sociale ?? 'N/A' }}</h2>
                                        <div class="email"><a href="mailto:{{ $facture->transitaire->email ?? 'N/A' }}">{{ $facture->transitaire->email ?? 'N/A' }}</a>
                                        <div class="address">{{ $facture->transitaire->localisation ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                @elseif ($facture->typeFacture == 'transporteur')
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">Beneficiaire:</div>
                                        <h2 class="to">{{ $facture->transporteur->raison_sociale ?? 'N/A' }}</h2>
                                        <div class="email"><a href="mailto:{{ $facture->transporteur->email ?? 'N/A' }}">{{ $facture->transporteur->email ?? 'N/A' }}</a>
                                        <div class="address">{{ $facture->transporteur->localisation ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">{{ $facture->numFacture }}</h1>
                                    <div class="date">Date d'enregistrement: {{ $facture->created_at->format('d/m/Y') }}</div>
                                    <div class="date">Date d'echeance: {{ $facture->date_paiement }}</div>
                                </div>
                            </div>
                            {{-- <table class="w-100">
                                <thead>
                                    <tr class="row">
                                        <th class="col-3">#</th>
                                        <th class="text-right col-3">Montant Global HT</th>
                                        <th class="text-right col-3">TAXE</th>
                                        <th class="text-right col-3">MONTANT Global TTC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="row">
                                        <td class="no col-3 size_12">{{ $facture->numFacture }}</td>
                                        <td class="unit col-3">{{ number_format($facture->montantTotalHt, 0, ',', ' ') }} Fcfa</td>
                                        <td class="qty col-3">{{ $facture->tvaAmat }} %</td>
                                        <td class="total col-3">{{ number_format($facture->montantTotalHt, 0, ',', ' ') }} Fcfa</td>
                                    </tr>
                                </tbody>

                            </table> --}}
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">RUBRIQUE</th>
                                        <th class="text-right">MONTANT HT (Fcfa)</th>
                                        <th class="text-right">TVA (%)</th>
                                        <th class="text-right">MONTANT TTC (Fcfa)</th>
                                    </tr>
                                </thead>
                                @if ($facture->typeFacture == 'transitaire')
                                <tbody class="size_12">
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
                                                    DOUANE
                                                </a>
                                            </h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtDouane, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaDouane }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcDouane, 0, ',', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3>
                                                AMATEUR
                                            </h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtAmat, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaAmat }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcAmat, 0, ',', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="text-left">
                                            <h3>ACCONIER</h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtAccor, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaAccor }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcAccor, 0, ',', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no">04</td>
                                        <td class="text-left">
                                            <h3>PRESTATION</h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtPres, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaPres }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcPres, 0, ',', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no">05</td>
                                        <td class="text-left">
                                            <h3>AUTRES</h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtAutre, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaAutre }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcAutre, 0, ',', ' ') }}</td>
                                    </tr>
                                </tbody>
                                <tfoot class="text-end w-25">
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL HT</td>
                                        <td>{{ number_format($facture->montantTotalHtTransit, 0, ',', ' ') }} <span>  Fcfa</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TAXE</td>
                                        <td>{{ $facture->TotalTvaTransit }} <span>%</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL TTC</td>
                                        <td>{{ number_format($facture->montantTotalTtcTransit, 0, ',', ' ') }} <span class="st-icon-pandora"> Fcfa</span></td>
                                    </tr>
                                </tfoot>
                                @endif
                                @if ($facture->typeFacture == 'transporteur')
                                <tbody class="size_12">
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
                                                    PRESTATION
                                                </a>
                                            </h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtTpPres, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaTpPres }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcTpPres, 0, ',', ' ') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3>
                                                AUTRES
                                            </h3>
                                        </td>
                                        <td class="unit">{{ number_format($facture->montantHtTpAutr, 0, ',', ' ') }}</td>
                                        <td class="qty">{{ $facture->tvaTpAutr }}</td>
                                        <td class="total">{{ number_format($facture->montantTtcTpAutr, 0, ',', ' ') }}</td>
                                    </tr>
                                </tbody>
                                <tfoot class="text-end w-25">
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL HT</td>
                                        <td>{{ number_format($facture->montantTotalHtTransport, 0, ',', ' ') }} <span>  Fcfa</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TAXE</td>
                                        <td>{{ $facture->TotalTvaTransport }} <span>%</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL TTC</td>
                                        <td>{{ number_format($facture->montantTotalTtcTransport, 0, ',', ' ') }} <span class="st-icon-pandora"> Fcfa</span></td>
                                    </tr>
                                </tfoot>
                                @endif


                            </table>

                            <div class="notices">
                                <div>Note:</div>
                                <div class="notice">{{ $facture->note }}</div>
                            </div>
                        </main>
                        <footer>La facture a été créée sur un ordinateur et est valable sans signature ni sceau.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.facturation.viewFactOrigin')
</div>
@endsection
