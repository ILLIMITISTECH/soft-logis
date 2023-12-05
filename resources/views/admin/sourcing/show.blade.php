@extends('admin.layouts.admin')
@section('section')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sourcing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:history.back();"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <div class="col-md-12 col-lg-12 d-flex justify-content-between gap-2 d-flex align-items-center py-auto mt-1 pe-0 mx-0">
                        @if ($sourcing->statut === 'draft')
                            <form action="{{ route('admin.statut.ToStarted', ['uuid' => $sourcing->uuid]) }}" method="POST" class="submitForm">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Soumettre</button>
                            </form>
                        @endif

                        @if ($sourcing->statut === 'started')
                        <form action="{{ route('admin.statut.TostartValidateDoc', ['uuid' => $sourcing->uuid]) }}" method="POST" class="submitForm">
                            @csrf
                            <button type="submit" class="btn btn-primary text-primary-light size_16 px-1 w-auto">Demarrage </button>
                        </form>
                        @endif

                        @if (in_array($sourcing->statut, ['started', 'validateDoc']))
                        <form action="{{ route('admin.sourcing.receptCommercialFact', ['uuid' => $sourcing->uuid]) }}" method="POST" class="submitForm @if ($sourcing->is_receivFactCom === 'true') d-none @endif
                            ">
                            @csrf
                            <input type="hidden" value="{{ $sourcing->uuid }}" name="sourcing_uuid">
                            <button type="submit" class="btn btn-primary text-primary-light size_16 px-1 w-auto ">Reception Facture commerciale </button>
                        </form>
                        @endif

                        @if ($sourcing->statut === 'validateDoc')
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#CreateOdreTransite" class="btn btn-primary">Ordre de transit</button>
                        @endif


                        @if ($sourcing->statut === 'odTransit')
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateOdrelivraison">Ordre de livraison
                            </button>
                        </div>
                        @endif

                        @if (in_array($sourcing->statut, ['stocked', 'odlivraison']))
                        <div class="">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addReception">Reception de produit</button>
                        </div>
                    @endif
                        @include('admin.stock.reception')
                        @include('admin.od_livraison.addLivraison')

                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="container text-center row">
            {{-- <div class="row">
                <div class="col-md-10 my-auto">
                    <ul class="tab-list d-flex justify-content-start">

                        <!-- Step 1 -->
                        <li class="tab-list__item {{ $sourcing->statut === 'draft' ? 'active' : '' }}">
                            <a class="tab-list__link">
                                <span class="step" {{ $sourcing->statut === 'draft' ? 'bg-light text-success' : '' }}>1</span>
                                <span class="desc">Brouillon</span>
                            </a>
                        </li>



                        <!-- Step 2 -->
                        <li class="tab-list__item {{ $sourcing->statut === 'wait' ? 'active' : '' }}">
                            <a class="tab-list__link">
                                <span class="step {{ $sourcing->statut === 'validated' ? 'bg-light text-success' : '' }}">2</span>
                                <span class="desc">En attente</span>
                            </a>
                        </li>

                        <!-- Step 3 -->
                        <li class="tab-list__item ">
                            <a class="tab-list__link {{ $sourcing->statut === 'validated' ? 'bg-success' : '' }}">
                                <span class="step  {{ $sourcing->statut === 'validated' ? 'bg-light text-success' : '' }}">3</span>
                                <span class="desc">Valider</span>
                            </a>
                        </li>

                        <!-- Step 4 -->
                        <li class="tab-list__item">
                            <a class="tab-list__link  {{ $sourcing->statut === 'refused' ? 'bg-danger' : '' }}">
                                <span class="step  {{ $sourcing->statut === 'refused' ? 'text-danger bg-light' : '' }}">4</span>
                                <span class="desc">Rejeter</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div> --}}

            <div id="stepper1" class="bs-stepper col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-lg-flex flex-lg-row align-items-lg-center justify-content-lg-between overflow-x-scroll"
                            role="tablist">


                            <div class="">
                                <div class="step" data-target="#test-l-1">
                                    <div class="step-trigger " role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                        <div class="bs-stepper-circle {{ $sourcing->statut === 'started' ? 'bg-success text-light' : '' }}">1</div>
                                        <div class="">
                                            <h5 class="mb-0 steper-title {{ $sourcing->statut === 'started' ? ' text-success' : '' }}">Démarrage Sourcing</h5>
                                            <p class="mb-0 steper-sub-title">Démarrage du sourcing</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-line"></div>

                            <div class="step" data-target="#test-l-2">
                                <div class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                    <div class="bs-stepper-circle {{ $sourcing->statut === 'validateDoc' ? 'bg-success text-light' : '' }}">2</div>
                                    <div class="">
                                        <h5 class="mb-0 steper-title {{ $sourcing->statut === 'validateDoc' ? 'text-success' : '' }}">Démarrage Document</h5>
                                        <p class="mb-0 steper-sub-title">Validation document</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-line"></div>

                            <div class="step" data-target="#test-l-3">
                                <div class="step-trigger " role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                                    <div class="bs-stepper-circle {{ $sourcing->statut === 'odTransit' ? 'bg-success text-light' : '' }}">3</div>
                                    <div class="">
                                        <h5 class="mb-0 steper-title {{ $sourcing->statut === 'odTransit' ? 'text-success' : '' }}">Odre de transit</h5>
                                        <p class="mb-0 steper-sub-title">En cours de transit</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-4">
                                <div class="step-trigger " role="tab" id="stepper1trigger4" aria-controls="test-l-4">
                                    <div class="bs-stepper-circle {{ $sourcing->statut === 'odlivraison' ? 'bg-success text-light' : '' }}">4</div>
                                    <div class="">
                                        <h5 class="mb-0 steper-title {{ $sourcing->statut === 'odlivraison' ? 'text-success' : '' }}">Ordre de livraison</h5>
                                        <p class="mb-0 steper-sub-title">En Cours de Livraison</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bs-stepper-line"></div>

                            <div class="step" data-target="#test-l-5">
                                <div class="step-trigger " role="tab" id="stepper1trigger5" aria-controls="test-l-5">
                                    <div class="bs-stepper-circle {{ $sourcing->statut === 'stocked' ? 'bg-success text-light' : '' }}">5</div>
                                    <div class="">
                                        <h5 class="mb-0 steper-title {{ $sourcing->statut === 'stocked' ? 'text-success' : '' }}">Reçu/Stocké</h5>
                                        <p class="mb-0 steper-sub-title">Mise en stock</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="main-body mt-4">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title d-flex align-items-center justify-content-between px-2 py-auto pe-0">
                                <div class="col-12">
                                    <h5 class="d-flex align-items-center text-uppercase px-2 my-2 size_16">Informations sur le sourcing</h5>
                                </div>
                            </div>

                            <hr>
                            <div class="card-body w-100">
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">N* de sourcing</h6>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        <div class="text-muted">{{ ($sourcing->code) ? $sourcing->code : '--' }}</div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Date de départ</h6>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        <div class="text-muted">{{ Carbon\Carbon::parse($sourcing->date_depart)->format('d/m/Y') ?? '--' }}</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Date d'arrivée</h6>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        <div class="text-muted">{{ Carbon\Carbon::parse($sourcing->date_arriver)->format('d/m/Y') ?? '--' }}</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Identifiant du Navire</h6>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        <div class="text-muted">{{ ($sourcing->id_navire) ? $sourcing->id_navire : '--' }}</div>
                                    </div>
                                </div>
                                <div class="row mb-3 col-12">
                                    <div class="col-md-4">
                                        <h6 class="mb-0">Information sur le navire</h6>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        <div class="form-control disabled text-start" disabled>
                                            {{ ($sourcing->info_navire) ? $sourcing->info_navire : '--' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('admin.od_transite.addmodal')
                        </div>
                        <div class="content">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="d-flex align-items-center text-uppercase size_16">Marchandises</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                    <tr class="text-uppercase size_14">
                                                        <th>N* serie</th>
                                                        <th>Famille</th>
                                                        <th>Status</th>
                                                        <th>Conformité</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 12px !important">
                                                    @forelse ($sourcing->products as $sourcingProduct)

                                                        @if($sourcingProduct)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ms-2">
                                                                        <h6 class="mb-0 font-14">#{{ $sourcingProduct->product->numero_serie ?? '--' }}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $sourcingProduct->product->familly->libelle }}</td>
                                                            <td>
                                                                @if ($sourcingProduct->product->status == 'enFabrication')
                                                                    <span class="badge bg-info text-light text-uppercase p-2">En Fabrication</span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'sortiUsine')
                                                                    <span class="badge bg-warning text-uppercase text-light p-2">Sortie d'usine</span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'enExpedition')
                                                                <span class="badge badge-info p-2 bg-info">
                                                                    En cours d'expedition import
                                                                </span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'arriverAuPod')
                                                                <span class="badge badge-success p-2 bg-success">
                                                                    Arrivé au POD
                                                                </span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'stocked')
                                                                <span class="badge bg-warning py-2 rounded">Reçu/Stocké</span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'expEnCours')
                                                                <span class="badge bg-primary py-2 rounded">En cours d'expedition Export</span>
                                                                @endif
                                                                @if ($sourcingProduct->product->status == 'delivered')
                                                                    <span class="badge bg-success py-2 rounded">Livrer</span>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @php
                                                                    $productConformity = App\Models\stockUpdate::where(['mouvement' => 'In' ,'product_id' => $sourcingProduct->product->id])->first();
                                                                    if ($productConformity) {
                                                                        $result = $productConformity->conformity;
                                                                    }
                                                                @endphp

                                                                @if ($productConformity)
                                                                    @if ($result == 'indefinie')
                                                                    <span class="badge badge-warning p-2 bg-warning">
                                                                        Pas encore receptionné
                                                                    </span>
                                                                    @endif

                                                                    @if ($result === 'off')
                                                                        <span class="badge badge-danger p-2 bg-danger">
                                                                            Non conforme
                                                                        </span>
                                                                    @elseif ($result === 'on')
                                                                        <span class="badge badge-success p-2 bg-success">
                                                                            Conforme
                                                                        </span>
                                                                    @endif

                                                                @endif
                                                            </td>
                                                            <td >
                                                                <button type="button" class="btn btn-info btn-sm radius-30 px-3 size_12">
                                                                    <a href="{{ route('admin.article.show', ['uuid' => $sourcingProduct->product->uuid]) }}" class="text-uppercase text-decoration-none text-light py-1">Detail</a>
                                                                </button>
                                                            </td>

                                                        </tr>
                                                        @endif
                                                    @empty
                                                        <tr>Aucun produit pour ce sourcing</tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header my-0 py-0 d-flex justify-content-between align-items-center row">
                                <div class="text-uppercase  col-10 size_16">Documents de sourcing</div>
                                <div class="bg-transparent text-center border-0 col-2 p-1 rounded">
                                    <button type="button" class="btn btn-success text-success border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#CreateSourcingFile">
                                        <i class="bx bxs-file-plus fs-3"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-striped table-hover table-sm mb-0">
										<thead>
											<tr>
												<th><i class='bx bx-up-arrow-alt ms-2'></i> Libellé
												</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
                                            @forelse ($sourcing->files as $sourcingFile)
                                            <tr>
												<td>
													<div class="d-flex align-items-center row">
														<div class="col-auto">
                                                            @if ($sourcingFile->statut === 'validate')
                                                                <i class='bx bxs-file-pdf text-success me-2 font-24' ></i>
                                                            @elseif ($sourcingFile->statut === 'refused')
                                                                <i class='bx bxs-file-pdf text-danger me-2 font-24' ></i>
                                                            @else ()
                                                                <i class='bx bxs-file-pdf text-info me-2 font-24' ></i>
                                                            @endif
														</div>
														<div class="font-weight-bold text-primary col-7">
                                                            {{ $sourcingFile->name }}
                                                            <p class="size_12 text-muted">{{ $sourcingFile->created_at->diffForHumans() }}</p>
                                                        </div>

													</div>
												</td>
												<td class="text-center col-3">
                                                    <button class="col-6 text-primary btn bg-transparent" data-bs-toggle="modal" data-bs-target="#pdfModal{{$sourcingFile->id}}" title="Lecture">
                                                        <i class="lni lni-eye"></i>
                                                    </button>
												</td>

											</tr>
                                            @include('admin.sourcing.lirePdf')
                                            @include('admin.sourcing.editDoc')
                                            @empty
                                            <tr>Aucun document associé à ce sourcing.</tr>
                                            @endforelse

										</tbody>
									</table>
								</div>



                            </div>
                        </div>

                        <div class="card">
                            @if ($transit != null)
                            <div class="row col-12 p-3">
                                <div class="col-10 size_14 text-uppercase">Ordre de transit</div>
                                <div class="col-2 text-end"><span> <a href="{{ route('admin.od_transite.show', ['uuid' => $transit->uuid]) }}"><i class="bx bxs-right-arrow-circle size_16"></i></a> </span></div>
                            </div>
                            @endif
                            <hr class="my-2">
                            @if ($transport != null)
                            <div class="row col-12 p-3">
                                <div class="col-10 size_14 text-uppercase">Ordre de transport</div>
                                <div class="col-2 text-end"><span> <a href="{{ route('admin.od_livraisons.show', ['uuid' => $transport->uuid]) }}"><i class="bx bxs-right-arrow-circle size_16"></i></a> </span></div>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>

                {{-- <div class="card-bo mb-4">
                    <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title"> Suivi des action </div>
                                </div>
                            </a>
                        </li>
                        <!--<li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Note</div>
                                </div>
                            </a>
                        </li>-->

                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                            <div class="content px-3">
                                <div class=" p-3">
                                    <div class="card-title gy-2">
                                        <div class="row">
                                            <div class="col">
                                                <strong class="text-decoration-underline">Creer par</strong>
                                                <p>{{ $sourcing->user_uuid}}</p>
                                            </div>
                                            <div class="col">
                                                <strong class="text-decoration-underline">Date de création</strong>
                                                <p>{{ $sourcing->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <strong class="text-decoration-underline">Modifier par</strong>
                                                <p>{{ $sourcing->user_uuid }}</p>
                                            </div>
                                            <div class="col">
                                                <strong class="text-decoration-underline">Date de modification</strong>
                                                <p>{{ $sourcing->updated_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <strong class="text-decoration-underline">Valider par</strong>
                                                <p>{{ $sourcing->validated_by }}</p>
                                            </div>
                                            <div class="col">
                                                <strong class="text-decoration-underline">Date de validation</strong>
                                                <p>{{ $sourcing->validated_date }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <strong class="text-decoration-underline">rejeter par</strong>
                                                <p>{{ $sourcing->refused_by }}</p>
                                            </div>
                                            <div class="col">
                                                <strong class="text-decoration-underline">Date de rejet</strong>
                                                <p>{{ $sourcing->refused_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee
                                squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes
                                anderson artisan four loko farm-to-table craft beer twee. Qui photo booth
                                letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                                cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                                Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan
                                fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY
                                ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr
                                butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                        </div>-->
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- Modal de creation de documents  --}}
    <!-- Modal -->
    @include('admin.sourcing.addDoc')

    </div>

@endsection
