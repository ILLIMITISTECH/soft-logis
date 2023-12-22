<div class="modal fade" id="addFacture" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg " >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase size_16">Enregistrement d'une nouvelle facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="bs-stepper-content mt-3 p-3 modal-dialog-scrollable overflow-x scroll" style="max-height: auto;">
                <form action="{{ route('admin.facturation.store') }}" method="post" class="submitForm" enctype="multipart/form-data" >
                    @csrf
                    <div id="" class="bs-stepp-pane content">
                        <div class="row gy-4">

                            <div class="col-12 col-lg-6">
                                <label for="numFacture" class="form-label">Numero de Facture <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="numFacture" name="numFacture" required>
                                @error('records.*.numFacture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="date_paiement" class="form-label">Date Limite de paiement</label>
                                <input type="date" class="form-control" id="date_paiement" name="date_paiement">
                            </div>

                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="num_bl" class="form-label">N° BL</label>
                                <input type="text" class="form-control" id="num_bl" name="num_bl">
                            </div>

                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="file_Bl" class="form-label">Document BL</label>
                                <input type="file" class="form-control" id="file_Bl" name="file_Bl">
                            </div>

                            <div class="col-6 col-md-6 col-lg-6">
                                <label for="inputTypeFacture" class="form-label">Type de facture</label>
                                <select class="form-select" name="typeFacture" id="inputTypeFacture">
                                    <option selected>Selectionnez un type de facture</option>
                                    <option value="transporteur" id="idTransporteur">Transporteur</option>
                                    <option value="transitaire" id="idTransitaire">Transitaire</option>

                                </select>
                            </div>

                            <div class="col-6 col-md-6 col-lg-6 type-block" id="idTransitaireBlock" data-type="transitaire">
                                <label for="transitaire_uuid" class="form-label">Bénéficiaire</label>
                                <select class="form-select" id="transitaire_uuid" name="transitaire_uuid">
                                    <option>Selectionné un transitaire</option>
                                    @foreach ($prestatairesTransits as $prestatairesTransit)
                                        <option value="{{ $prestatairesTransit->uuid }}" class="transitre-option">{{ $prestatairesTransit->raison_sociale }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 col-md-6 col-lg-6 d-none type-block" id="idTransporteurBlock" data-type="transporteur">
                                <label for="transporteur_uuid" class="form-label">Bénéficiaire</label>
                                <select class="form-select"  name="transporteur_uuid">
                                    <option selected>Selectionné un transporteur</option>
                                    @foreach ($prestatairesTransports as $prestatairesTransport)
                                        <option value="{{ $prestatairesTransport->uuid }}" class="transporteu">{{ $prestatairesTransport->raison_sociale }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-4 col-12">
                                <hr>
                                <div class="col-12 my-2 row text-start size_12 d-flex justify-content-around bold">
                                    <div class="col-4">RUBRIQUE</div>
                                    <div class="col-3">PRIX UNITAIRE (Fcfa)</div>
                                    <div class="col-2">Qty</div>
                                    <div class="col-3">TOTAL LIGNE (Fcfa)</div>
                                </div>
                                <hr>

                            <button class="btn btn-sm btn-primary mt-2" type="button" onclick="cloneBlock()">Ajouter une ligne</button>

                            <div id="container">
                                <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                    <div class="col-4">
                                        <input class="form-control form-control-sm rubrique" placeholder="rubrique" name="rubrique[]">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control form-control-sm" id="prixUnitaire" name="prixUnitaire[]" placeholder="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control form-control-sm" id="qty" name="qty[]" placeholder="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control form-control-sm" id="totalLigne" name="totalLigne[]" readonly placeholder="">
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-sm btn-danger delete-btn" type="button">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-sm btn-primary mt-4" type="button" onclick="cloneBlockDoc()">Ajouter une ligne Doc</button>
                            <div class="container " id="contentBlockDoc">
                                <div class="docBlock row d-flex justify-content-between align-items-center align-self-center">
                                    <div class="col-10 col-lg-10 mt-4 ">
                                        <label for="InputCountry" class="form-label">Facture Original</label>
                                        <input type="file" class="form-control" id="facture_original" name="facture_original">
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-sm btn-danger delete-btn-doc" type="button">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">

                                <div class="col-sm-12 col-lg-12">
                                    <textarea class="form-control" id="input47" name="note" rows="3" placeholder="Saisir une note"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <button type="submit" class="btn btn-primary px-4">Enregistrer<i
                                        class='bx bx-right-arrow-alt ms-2'></i></button>
                            </div>
                        </div>
                        <!---end row-->

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('idTransporteur').addEventListener('click', function () {
    var blockElement = document.getElementById('idTransporteurBlock');
    var blockTransit = document.getElementById('idTransitaireBlock');
    blockElement.classList.remove('d-none');
    blockTransit.classList.add('d-none');
});
document.getElementById('idTransitaire').addEventListener('click', function () {
    var blockTransporteur = document.getElementById('idTransporteurBlock');
    var blockTransitaire = document.getElementById('idTransitaireBlock');
    blockTransitaire.classList.remove('d-none');
    blockTransporteur.classList.add('d-none');
});
document.getElementById('idAutre').addEventListener('click', function () {
    var blockTransporteur = document.getElementById('idTransporteurBlock');
    var blockTransitaire = document.getElementById('idTransitaireBlock');
    blockTransitaire.classList.add('d-none');
    blockTransporteur.classList.add('d-none');
});


function cloneBlock() {
  let blockToClone = document.querySelector('.row.mt-2');
  let clonedBlock = blockToClone.cloneNode(true);

    // Vider les valeurs des inputs clonés
    let inputs = clonedBlock.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
    });

    document.addEventListener('input', event => {
        if (event.target && (event.target.name === 'prixUnitaire[]' || event.target.name === 'qty[]')) {
            const prestation = event.target.closest('.row.mt-2');
            const prixUnitaire = prestation.querySelector('[name="prixUnitaire[]"]').value;
            const qty = prestation.querySelector('[name="qty[]"]').value;
            const total = prestation.querySelector('[name="totalLigne[]"]');
            total.value = (prixUnitaire * qty);

        }
    });


  let deleteButton = clonedBlock.querySelector('.delete-btn');
  deleteButton.addEventListener('click', function() {
    clonedBlock.remove();
  });

  let container = document.getElementById('container');
  container.appendChild(clonedBlock);


}
function cloneBlockDoc() {
  let blockToClone = document.querySelector('.docBlock');
  let clonedBlockDoc = blockToClone.cloneNode(true);

    // Vider les valeurs des inputs clonés
    let inputs = clonedBlockDoc.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
    });



  let container = document.getElementById('contentBlockDoc');
  container.appendChild(clonedBlockDoc);
  let deleteButton = clonedBlockDoc.querySelector('.delete-btn-doc');
  deleteButton.addEventListener('click', function() {
    clonedBlockDoc.remove();
  });

}

</script>
