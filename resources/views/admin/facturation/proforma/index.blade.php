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
                    <li class="breadcrumb-item active" aria-current="page">Proforma</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">

              <div class="ms-auto">
                @can('Create Facture')
                {{-- <button type="button" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addFactureProforma"><i class="bx bxs-plus-square"></i>Nouvelle Facture</button> --}}
                <a href="{{ route('admin.proforma.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0" ><i class="bx bxs-plus-square"></i>{{ __('Nouvelle Proforma') }}</a>
                @endcan
              </div>
            </div>
            {{-- <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>N° Facture</th>
                            <th>Beneficiaire</th>
                            <th>Total TTC(Fcfa)</th>
                            <th>Date</th>
                            <th>Voir Detail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($factureProformas as $facture)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#{{ $facture->code ?? 'N/A' }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                               {{   $facture->transporteur->raison_sociale ?? 'N/A' }}
                            </td>
                            <td>{{ number_format($facture->cout_prestation, 0, ',', ' ') }}</td>
                            <td>{{ $facture->created_at->format('d-m-Y') ?? 'N/A' }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4 text-white"><a href="" class="text-white"   >Detail</a></button>
                            </td>
                            <td>

                            </td>
                        </tr>

                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div> --}}
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Transporteur</th>
                            <th>Destination</th>
                            <th>PorteChar</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grilleTarifs->groupBy('destination.libelle') as $libelle => $items)
                            <tr>
                                <td>{{ $items[0]->transporteur->raison_sociale }}</td>
                                <td rowspan="{{ count($items) }}">{{ $libelle }}</td>
                                <td>{{ $items[0]->porteChar->libelle }}</td>
                                <td>{{ $items[0]->cout }}</td>
                            </tr>
                            @for ($i = 1; $i < count($items); $i++)
                                <tr>
                                    <td>{{ $items[0]->transporteur->raison_sociale }}</td>
                                    <td>{{ $items[$i]->porteChar->libelle }}</td>
                                    <td>{{ $items[$i]->cout }}</td>
                                </tr>
                            @endfor
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Transporteur</th>
                            <th>Destination</th>
                            <th>PorteChar</th>
                            <th>Montant</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('admin.facturation.proforma.addModal')
</div>




@endsection
