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
                            <th>Total</th>
                            <th>Date Echeance</th>
                            <th>View Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($refacturations as $item )
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
                            <td>{{ $item->total ?? 'N/A'  }}</td>
                            <td>{{ $item->date_echeance ?? 'N/A' }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4">View Details</button>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="javascript:;" class=""><i class='bx bxs-edit'></i></a>
                                    <a href="javascript:;" class="ms-3"><i class='bx bxs-trash'></i></a>
                                </div>
                            </td>
                        </tr>
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
