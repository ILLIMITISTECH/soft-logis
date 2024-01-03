<div class="modal fade" id="editExpeditionModal{{ $expedition->uuid }}" tabindex="-1" aria-hidden="true">
    <div class="page-content">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title size_16">Mise a jour de l'ordre d'expedition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body page-content size_13">
                    <form action="{{ route('admin.odre_expedition.update', $expedition->uuid) }}" method="POST" enctype="multipart/form-data" class="submitForm">
                        @csrf
                        <div id="t" role="tabpanel" class="bs" aria-labelledby="">
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <label for="client_uuid" class="form-label">Clients</label>
                                    <select class="form-select" id="client_uuid" name="client_uuid" aria-label="Default select example">
                                        @if ($expedition->client)
                                        <option value="{{ $expedition->client->uuid}}" selected>{{ $expedition->client->raison_sociale ?? 'N/A'}}</option>
                                        @else
                                            <option selected>Selectionné un client</option>
                                        @endif
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->uuid }}">{{ $client->raison_sociale }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6">
                                    <label for="date_liv" class="form-label">Date de livraison</label>
                                    <input type="date" class="form-control" value="{{ $expedition->date_liv }}" id="date_liv" name="date_liv">
                                </div>
                                <input type="hidden" name="expedition_id" value="{{ $expedition->id }}">
                                <div>
                                    <div class="col my-2">
                                        <button type="button" class="btn btn-outline-primary" onclick="addNewRowExp()"><i class="bx bxs-plus-square"></i>Ajouter une ligne produit</button>
                                    </div>

                                    <div class="content row gy-2 mb-2 col-12 d-flex " id="clone_ligne_prodt">
                                        <div class="col-5">
                                            <select class="form-control families_select" id="families_select" name="famille_id">
                                                <option value="">Sélectionnez une famille</option>
                                                @foreach ($families as $family)
                                                    <option value="{{ $family->id }}">{{ $family->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <select class="form-control col-3 products_select"  id="products_select" name="product_id[]">
                                                <option value="">Sélectionnez un produit</option>
                                                @foreach ($products as $product)
                                                    <option id="product_option_{{ $product->id }}" data-famille-exp-id="{{ $product->familly->id }}" value="{{ $product->id }}" class="product-option">{{ $product->numero_serie }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-1 d-flex text-center justify-content-center text-align-center">
                                            <button class="delete-button btn-outline-danger w-75 h-75 my-auto" type="button" onclick="deleteRow(this)"><i class="fadeIn animated bx bx-x"></i></button>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-lg-12">
                                    <label for="incoterm" class="form-label">Incoterm</label>
                                    <textarea name="incoterm" id="incoterm" class="form-control" cols="30" rows="3" value="{{ $expedition->incoterm }}">{{ $expedition->incoterm }}</textarea>
                                </div>

                                <div class="col-12">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </div>
                            </div>
                            <!---end row-->
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
