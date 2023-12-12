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
                    <li class="breadcrumb-item active" aria-current="page">Prestataires</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total factures</p>
                            <h4 class="my-1">{{ number_format($total, 0, ',', ' ') }} Fcfa</h4>
                            <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>{{ $total_count }} Factures</p>
                        </div>
                        <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Bon à Payé</p>
                            <h4 class="my-1">{{ number_format($total_bon_payer, 0, ',', ' ') }} Fcfa</h4>
                            <p class="mb-0 font-13 text-info"><i class='bx bxs-up-arrow align-middle'></i>{{ $total_bon_count }} Factures</p>
                        </div>
                        <div class="widgets-icons bg-light-info text-danger ms-auto"><i class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Facture payé</p>
                            <h4 class="my-1">{{ number_format($total_payed, 0, ',', ' ') }} Fcfa</h4>
                            <p class="mb-0 font-13 text-success"><i class='bx bxs-down-arrow align-middle'></i>{{ $total_payed_count }} factures</p>
                        </div>
                        <div class="widgets-icons bg-light-danger text-info ms-auto"><i class='bx bxs-binoculars'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Facture Rejeter</p>
                            <h4 class="my-1">{{ number_format($total_cancel, 0, ',', ' ') }} Fcfa</h4>
                            <p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>{{ $total_cancel_count }} factures</p>
                        </div>
                        <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">

              <div class="ms-auto">
                @can('Create Facture')
                <button type="button" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addFacture"><i class="bx bxs-plus-square"></i>Nouvelle Facture</button>
                @endcan
              </div>
            </div>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>N° Facture</th>
                            <th>Beneficiaire</th>
                            <th>Statut</th>
                            <th>Total TTC(Fcfa)</th>
                            <th>Date</th>
                            <th>Voir Detail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($factures as $facture)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#{{ $facture->numFacture ?? 'N/A'}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($facture->typeFacture == 'transitaire')
                                    {{ $facture->transitaire->raison_sociale ?? 'N/A' }}
                                @elseif ($facture->typeFacture == 'transporteur')
                                    {{ $facture->transporteur->raison_sociale ?? 'N/A' }}
                                @endif
                            </td>
                            <td>
                                @if ($facture->statut == 'reccording')
                                    <div class="badge rounded-pill text-white bg-secondary p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i> Enregistrement
                                    </div>
                                @endif
                                @if ($facture->statut == 'good_pay')
                                    <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i> Bon à Payé
                                    </div>
                                @endif
                                @if ($facture->statut == 'payed')
                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i> Payé
                                    </div>
                                @endif
                                @if ($facture->statut == 'cancel')
                                    <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i> Rejeter
                                    </div>
                                @endif
                            </td>
                            @if ($facture->typeFacture == 'transitaire')
                            <td>{{ number_format($facture->montantTotalTtcTransit, 0, ',', ' ') }} Fcfa</td>
                            @endif
                            @if ($facture->typeFacture == 'transporteur')
                            <td>{{ number_format($facture->montantTotalTtcTransport, 0, ',', ' ') }} Fcfa</td>
                            @endif
                            <td>{{ $facture->created_at->diffForHumans() }}</td>
                            <td><button type="button" class="btn btn-primary btn-sm radius-30 px-4 text-white"><a href="{{ route('admin.facturation.show', $facture->uuid) }}" class="text-white"   >Detail</a></button></td>
                            <td>
                                <div class="d-flex order-actions">
                                    @can('Edit Facture')
                                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#editFacture{{ $facture->uuid }}"><i class='bx bxs-edit'></i></a>
                                    @endcan
                                    {{-- <button type="button" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addFacture"><i class="bx bxs-plus-square"></i>Nouveau Facture</button> --}}
                                    @can('Delette Facture')
                                    <a class="ms-3 deleteConfirmation" data-uuid="{{$facture->uuid}}"
                                        data-type="confirmation_redirect" data-placement="top"
                                        data-token="{{ csrf_token() }}"
                                        data-url="{{route('admin.facturation.destroy',$facture->uuid)}}"
                                        data-title="Vous êtes sur le point de supprimer {{$facture->code}} "
                                        data-id="{{$facture->uuid}}" data-param="0"
                                        data-route="{{route('admin.facturation.destroy',$facture->uuid)}}"><i
                                            class='bx bxs-trash' style="cursor: pointer"></i>
                                    </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @include('admin.facturation.editModal')
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.facturation.addModal')
</div>

@endsection
