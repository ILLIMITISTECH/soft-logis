@extends('admin.layouts.admin')
@section('section')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3 text-uppercase">Facturation</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Liste</li>
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

              <div class="ms-auto" data-bs-toggle="modal" data-bs-target="#addFactureModal">
                <button class="btn btn-primary radius-30"><i class="bx bxs-plus-square"></i>Nouvelle facture</button>
              </div>
            </div>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Beneficiaire</th>
                            <th>Statut</th>
                            <th>Total (XOF)</th>
                            <th>Total (€)</th>
                            <th>Date Echeance</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($refacturations as $item )
                        @php
                             $fac_pres = DB::table('facture_prestations')->where('etat', 'actif')->where('facture_uuid', $item->uuid)->sum('total');
                             $exchangeRate = 0.00152;
                             $euroAmount = $fac_pres * $exchangeRate;
                        @endphp
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#{{ $item->num_facture ?? 'N/A'}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->refClient ?? 'N/A' }}</td>
                            <td>
                                <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{ $item->statut ?? 'N/A'}}</div>
                            </td>
                            <td>{{ $fac_pres ?? 'N/A'  }}   </td>
                            <td>{{ $euroAmount ?? 'N/A'  }}   </td>
                            <td>{{ $item->date_echeance ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('admin.refacturation.show', $item->uuid) }}"
                                        style="cursor: pointer"><i class="lni lni-eye"></i>
                                    </a>
                                    <a href="javascript:;" class="mx-3" data-bs-toggle="modal" data-bs-target="#editFacture{{ $item->uuid }}"><i class='bx bxs-edit'></i></a>

                                    <a class=" deleteConfirmation" data-uuid="{{$item->uuid}}"
                                        data-type="confirmation_redirect" data-placement="top"
                                        data-token="{{ csrf_token() }}"
                                        data-url="{{route('admin.refacturation.destroy',$item->uuid)}}"
                                        data-title="Vous êtes sur le point de supprimer {{$item->code}} "
                                        data-id="{{$item->uuid}}" data-param="0"
                                        data-route="{{route('admin.refacturation.destroy',$item->uuid)}}"><i
                                            class='bx bxs-trash' style="cursor: pointer"></i>
                                    </a>
                                </a>
                                </div>
                            </td>
                        </tr>
                        @include('admin.refacturation.editFactureModal')
                        @empty
                        <tr>Aucune Facture enregistré</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.refacturation.addFactureModal')
</div>
@endsection
