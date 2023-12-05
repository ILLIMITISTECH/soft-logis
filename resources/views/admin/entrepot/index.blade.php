@extends('admin.layouts.admin')
@section('section')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Stockage</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Entrepots</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="ms-auto">
                    <button type="button" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addEntrepotModal"><i class="bx bxs-plus-square"></i>Creer Entrepot</button>
                  </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Code#</th>
                            <th>Nom</th>
                            <th>Emplacement</th>
                            <th>Capacité</th>
                            <th>Couleur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($entrepots as $entrepot)

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#{{ $entrepot->code }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $entrepot->nom }}</td>
                            <td><div class=" text-uppercase px-3">{{ $entrepot->emplacement }}</div></td>
                            <td>{{ $entrepot->capacity }}</td>
                            <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{ $entrepot->color }}</div></td>

                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('admin.stock_entrepot.show', $entrepot->uuid) }}" class=""><i class="lni lni-eye"></i></a>
                                    <a href="javascript:;" class="mx-3"><i class='bx bxs-edit'></i></a>
                                    <a href="javascript:;" class=""><i class='bx bxs-trash'></i></a>
                                </div>
                            </td>
                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('admin.entrepot.addModal')
</div>
@endsection
