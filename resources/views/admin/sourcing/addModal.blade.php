<div class="modal fade" id="CreateSourcing" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Démarrage de Sourcing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="stronger">
                <form action="{{ route('admin.sourcing.store') }}" method="POST" enctype="multipart/form-data" class="submitForm">
                    @csrf
                    <div>
                        <div class="my-3">
                            <strong class="text-uppercase text-primary my-auto"></strong>
                            <div class=" card-headerd-flex align-items-center justify-content-between">
                                <button id="doc_t" type="button" class="btn btn-outline-primary py-1 my-auto mb-3" onclick="addnewBlockProduct()"><i class="bx bxs-plus-square"></i>Ajouter une ligne produit</button>
                            </div>
                            <div class="mb-2 card-body" id="productBlock">
                                <!-- Dom js pour l'ajout de nouveaux documents de transite-->
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="content">
                        <div class="row col-12">
                            <div class="mb-3" style="font-size: 13px">
                                <label for="id_navire" class="form-label text-uppercase">Identifiant du navire <span><span class="text-danger">*</span></span></label>
                                <input type="text" class="form-control" id="id_navire" name="id_navire" autocomplete="off" required>
                                @error('id_navire')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row text-uppercase" style="font-size: 13px">
                            <div class="col-6">
                                <label for="date_depart" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="date_depart" name="date_depart" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <label for="date_arriver" class="form-label">Date estimative d'arrivée</label>
                                <input type="date" class="form-control" id="date_arriver" name="date_arriver" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4 mt-2">

                    <div class="">
                        <div class="mb-3 col-12" style="font-size: 13px">
                            <label for="info_navire" class="form-label text-uppercase">Description du navire</label>
                            <textarea class="form-control" id="info_navire" name="info_navire" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="">
                        <div class="mb-3 col-12" style="font-size: 13px">
                            <label for="note" class="form-label text-uppercase">Note</label>
                            <textarea class="form-control" id="note" name="note" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <div class="mb-3">
                        <strong class="text-uppercase text-secondary my-auto">Documents de sourcing (PDF, Word, Excel)</strong>
                        <div class="d-flex align-items-center justify-content-between">
                            <button id="add_doc" type="button" class="btn btn-outline-primary py-1 my-auto mb-3" onclick="addNewDocument()"><i class="bx bxs-plus-square"></i>Ajouter un document</button>
                        </div>
                        <div class="mb-2" id="docu_content">

                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="created_by" value="{{ Auth::user()->name . ' ' . Auth::user()->lastname }}" name="created_by">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="CreateSourcing" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Démarrage de Sourcing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="stronger">
                <form action="{{ route('admin.sourcing.store') }}" method="POST" enctype="multipart/form-data" class="submitForm">
                    @csrf
                    <div>
                        <div class="col my-2">
                            <button type="button" class="btn btn-outline-primary" onclick="addNewRow()"><i class="bx bxs-plus-square"></i>Ajouter une ligne produit</button>
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
                            <div class="col-3">
                                <select class="form-control col-3 products_select" id="products_select" name="product_id[]">
                                    <option value="">Bon de commande</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->numero_bon_commande }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-control col-3 products_select"  id="products_select" name="product_id[]">
                                    <option value="">Numero de serie</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->numero_serie }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-1 d-flex text-center justify-content-center text-align-center">
                                <button class="delete-button btn-outline-danger w-75 h-75 my-auto" type="button" onclick="deleteRow(this)"><i class="fadeIn animated bx bx-x"></i></button>
                            </div>
                        </div>

                    </div>

                    <hr class="mb-4">

                    <div class="content">
                        <div class="row col-12">
                            <div class="mb-3" style="font-size: 13px">
                                <label for="id_navire" class="form-label text-uppercase">Identifiant du navire</label>
                                <input type="text" class="form-control" id="id_navire" name="id_navire" autocomplete="off">
                            </div>
                        </div>
                        <div class=" row text-uppercase" style="font-size: 13px">
                            <div class="col-6">
                                <label for="date_depart" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="date_depart" name="date_depart" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <label for="date_arriver" class="form-label">Date estimative d'arrivée</label>
                                <input type="date" class="form-control" id="date_arriver" name="date_arriver" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4 mt-2">

                    <div class="">
                        <div class="mb-3 col-12" style="font-size: 13px">
                            <label for="info_navire" class="form-label text-uppercase">Description du navire</label>
                            <textarea class="form-control" id="info_navire" name="info_navire" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="">
                        <div class="mb-3 col-12" style="font-size: 13px">
                            <label for="note" class="form-label text-uppercase">Note</label>
                            <textarea class="form-control" id="note" name="note" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <div class="mb-3">
                        <strong class="text-uppercase text-secondary my-auto">Documents de sourcing (PDF, Word, Excel)</strong>
                        <div class="d-flex align-items-center justify-content-between">
                            <button id="add_doc" type="button" class="btn btn-outline-primary py-1 my-auto mb-3" onclick="addNewDocument()"><i class="bx bxs-plus-square"></i>Ajouter un document</button>
                        </div>
                        <div class="mb-2" id="docu_content">

                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="created_by" value="{{ Auth::user()->name . ' ' . Auth::user()->lastname }}" name="created_by">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     var familiesSelect = document.getElementById('families_select');
    //     var productsSelect = document.getElementById('products_select');
    //     var productOptions = document.getElementsByClassName('product-option');

    //     familiesSelect.addEventListener('change', function () {
    //         var selectedFamilleId = familiesSelect.value;

    //         for (var i = 0; i < productOptions.length; i++) {
    //             var option = productOptions[i];
    //             var familleId = option.getAttribute('data-famille-id');

    //             // Afficher ou masquer l'option en fonction de la famille sélectionnée
    //             option.style.display = (selectedFamilleId === '' || selectedFamilleId === familleId) ? 'block' : 'none';
    //         }
    //     });
    // });

    document.addEventListener('click', function (event) {
        var isBonCommandClick = event.target.id === 'bon_commande_input';

        if (!isBonCommandClick) {

            document.getElementById('search_resultsByBon').innerHTML = '';
        }
    });
    document.addEventListener('click', function (event) {
        var isBonSerialClick = event.target.id === 'numero_serie_input';
        if (!isBonSerialClick) {

            document.getElementById('search_results').innerHTML = '';
        }
    });


</script>


