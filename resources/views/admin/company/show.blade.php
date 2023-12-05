@extends('admin.layouts.admin')
@section('section')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Compagnie</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Plus d'info</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center gy-2">
                                <img src="{{ asset('files/' . $company->logo) }}" class="rounded-circle') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4 class="text-uppercase">{{ $company->raison_sociale }}</h4>
                                    <p class="text-secondary mb-2 text-capitalize">{{ $company->type }}</p>
                                </div>

                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                @if ($company->type === 'transporteur')
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Voie d'expedition :</h6>
                                    <span class="text-uppercase">{{ $company->voie_transport }}</span>
                                </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Email :</h6>
                                    <span>{{ $company->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Télephone :</h6>
                                    <span class="text-secondary">{{ $company->phone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Localisation :</h6>
                                    <span class="text-secondary">{{ $company->localisation }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Regis de commerce</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control disabled" disabled placeholder="{{ $company->identification }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" disabled placeholder="{{ $company->email }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Télephone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" disabled placeholder="{{ $company->phone }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Localisation</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" disabled placeholder="{{ $company->localisation }}" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-title p-2">
                                    <h6>Contact</h6>
                                </div>
                                <hr class="my-1">
                                <div class="card-body">
                                    <div class="content">
                                        <input type="text" disabled placeholder="Contact 1" class="form-control">
                                        <p class="text-capitalize">{{ $company->contact_one_name. ' ' .$company->contact_one_lastName }}</p>
                                        <div class=" my-3">
                                            {{ $company->contact_one_email }}
                                        </div>

                                    </div>
                                    <hr class="my-2">
                                    <div class="contant">
                                        <input type="text" disabled placeholder="Contact 2" class="form-control">

                                        <p class="text-capitalize">{{ $company->contact_two_name. ' ' .$company->contact_two_lastName }}</p>
                                        <div class=" my-3">
                                            {{ $company->contact_two_email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
