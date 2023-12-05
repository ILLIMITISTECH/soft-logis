<div class="modal fade" id="EditSourcing{{ $sourcing->uuid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Modification de Sourcing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body delete-product-form">

                @if ($sourcing->products->count() > 0)
                <div class="content px-4">
                    <div class="row size_12 d-flex justify-content-between border-bottom border-dark ">
                        <span class="col-1">#</span>
                        <span class="col-4">Famille</span>
                        <span class="col-2">N° serie</span>
                        <span class="col-3">N° Bon Commande</span>
                        <span class="col-2"></span>
                    </div>
                    @foreach ($sourcing->products as $index => $item)
                    <div class="row size_12  d-flex justify-content-between border-bottom border-dark  py-2">
                        <span class="col-1">{{ $index + 1 }}</span>
                        <span class="col-4">{{ $item->product->familly->libelle ?? '' }}</span>
                        <span class="col-2">{{ $item->product->numero_serie }}</span>
                        <span class="col-3">{{ $item->product->numero_bon_commande }}</span>

                        <div class="col-2">

                            <form action="{{ route('admin.sourcing.deletteproduct', $item->product->id) }}" method="post" class="submitForm delete-product-form" id="deleteForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <input type="hidden" name="sourcing_id" value="{{ $sourcing->id }}">
                                <button type="submit" class="cursor-pointer btn btn-sm "><i class="fadeIn animated bx bx-x"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('admin.sourcing.update', $sourcing->uuid) }}" method="POST" enctype="multipart/form-data" class="submitForm" id="updateForm">
                    @csrf
                    <div>
                        <div class=" card-headerd-flex align-items-center justify-content-between">
                            <button id="c_t" type="button" class="btn btn-outline-primary py-1 my-auto mb-3" onclick="editBlockProduct()"><i class="bx bxs-plus-square"></i>modifier une ligne produit</button>
                        </div>
                        <div class="mb-2 card-body" id="editproductBlock">

                        </div>

                        <input type="hidden" class="form-control" id="sourcing_id" value="{{ $sourcing->uuid }}" name="sourcing_id">
                    </div>

                    <hr class="mb-4">
                    <!-- Date de départ et Date d'arrivée -->
                    <div class="content">
                        <div class=" row text-uppercase" style="font-size: 13px">
                            <div class="col-6">
                                <label for="date_depart" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="date_depart" name="date_depart" autocomplete="off" value="{{ $sourcing->date_depart }}">
                            </div>
                            <div class="col-6">
                                <label for="date_arriver" class="form-label">Date d'arrivée</label>
                                <input type="date" class="form-control" id="date_arriver" name="date_arriver" autocomplete="off" value="{{ $sourcing->date_arriver }}">
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4 mt-2">

                    <!-- Informations sur le Navire -->
                    <div class="">

                        <div class="mb-3" style="font-size: 13px">
                            <label for="id_navire" class="form-label text-uppercase">Identifiant du navire</label>
                            <input type="text" class="form-control" id="id_navire" name="id_navire"  value="{{ $sourcing->id_navire }}">
                        </div>
                        <div class="mb-3" style="font-size: 13px">
                            <label for="info_navire" class="form-label text-uppercase">Description du navire</label>
                            <textarea class="form-control" id="info_navire" name="info_navire" >{{ $sourcing->info_navire }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                        <button type="submit" class="btn btn-primary" form="updateForm">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

