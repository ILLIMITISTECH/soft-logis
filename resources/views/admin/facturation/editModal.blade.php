<div class="modal fade" id="editFacture{{ $facture->uuid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase size_16">Enregistrement d'une nouvelle facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="bs-stepper-content mt-3 p-3 modal-dialog-scrollable overflow-x scroll" style="max-height: auto;">
                <form action="{{ route('admin.facturation.update', $facture->uuid) }}" method="post" class="submitForm" enctype="multipart/form-data" >
                    @csrf
                    <div id="" class="bs-stepp-pane content">

                        @if ($facture->typeFacture == 'transitaire')

                            @if ($facture->transitaire->type == 'transitaire')

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label for="numFacture" class="form-label">Numero de Facture</label>
                                    <input type="text" class="form-control" value="{{ $facture->numFacture }}" id="numFacture" placeholder="{{ $facture->numFacture }}" name="numFacture">
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="date_paiement" class="form-label">Date Limite de paiement</label>
                                    <input type="date" value="{{ $facture->date_paiement ?? '' }}" class="form-control" id="date_paiement" name="date_paiement">
                                </div>
                            </div>
                            <div class="content row d-flex flex-row py-4 col-12">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <label for="input47" class="form-label">Transitaire</label>
                                    <select class="form-select" id="input47" name="transitaire_uuid">
                                        <option selected value="{{ $facture->transitaire->uuid }}">{{ $facture->transitaire->raison_sociale }}</option>
                                        @foreach ($prestatairesTransits as $prestatairesTransit)
                                            <option value="{{ $prestatairesTransit->uuid }}" class="transitaire-option">{{ $prestatairesTransit->raison_sociale }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6 row">
                                    <div class="col-8">
                                        <label for="num_blTransit" class="form-label">N° BL</label>
                                        <input type="text" class="form-control" id="num_blTransit" name="num_blTransit"
                                        value="{{ $facture->num_blTransit }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="file_BlTransit" class="form-label">Doc BL</label>
                                        <input type="file" class="form-control" id="file_BlTransit" name="file_BlTransit" value="{{ $facture->file_BlTransit }}">
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <hr>
                                    <div class="col-12 my-2 row text-start size_12 d-flex justify-content-between bold">
                                        <div class="col-3">RUBRIQUE</div>
                                        <div class="col-3">MONTANT HT (Fcfa)</div>
                                        <div class="col-2">TAXES (%)</div>
                                        <div class="col-3">MONTANT TTC (Fcfa)</div>
                                    </div>
                                    <hr>
                                    <!-- rubriqueDouane -->
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="DOUANE">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtDouane" name="montantHtDouane" value="{{ $facture->montantHtDouane }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaDouane" name="tvaDouane" value="{{ $facture->tvaDouane }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcDouane" name="montantTtcDouane" value="{{ $facture->montantTtcDouane }}">
                                        </div>
                                    </div>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="AMATEUR">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtAmat" name="montantHtAmat" value="{{ $facture->montantHtAmat }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaAmat" name="tvaAmat" value="{{ $facture->tvaAmat }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcAmat" name="montantTtcAmat" value="{{ $facture->montantTtcAmat }}">
                                        </div>
                                    </div>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="ACCONIER">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtAccor" name="montantHtAccor" value="{{ $facture->montantHtAccor }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaAccor" name="tvaAccor" value="{{ $facture->tvaAccor }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcAccor" name="montantTtcAccor" value="{{ $facture->montantTtcAccor }}">
                                        </div>
                                    </div>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="PRESTATION">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtPres" name="montantHtPres" value="{{ $facture->montantHtPres }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaPres" name="tvaPres" value="{{ $facture->tvaPres }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcPres" name="montantTtcPres" value="{{ $facture->montantTtcPres }}">
                                        </div>
                                    </div>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="AUTRES">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtAutre" name="montantHtAutre" value="{{ $facture->montantHtAutre }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaAutre" name="tvaAutre" value="{{ $facture->tvaAutre }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcAutre" name="montantTtcAutre" value="{{ $facture->montantTtcAutre }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <label for="InputCountry" class="form-label">Facture Original</label>
                                    <input type="file" class="form-control" id="facture_original" name="facture_original" value="{{ $facture->facture_original }}">
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-12 col-lg-12">
                                        <textarea class="form-control" id="input47" name="note" rows="3" placeholder="Saisir une note">{{ $facture->note }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @endif

                        @endif

                        @if ($facture->typeFacture == 'transporteur')

                            @if ($facture->transporteur == 'transporteur')

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label for="numFacture" class="form-label">Numero de Facture</label>
                                    <input type="text" value="{{ $facture->numFacture }}" placeholder="{{ $facture->numFacture }}" class="form-control" id="numFacture" name="numFacture">
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label for="date_paiement" class="form-label">Date Limite de paiement</label>
                                    <input type="date" value="{{ $facture->date_paiement }}" class="form-control" id="date_paiement" name="date_paiement">
                                </div>
                            </div>

                            <div class="content row d-flex flex-row py-4 col-12" data-type="transporteur">

                                <input type="hidden" id="prestataireUuid" name="transporteur_uuid" value="">

                                <div class="col-6 col-lg-6">
                                    <label for="InputLanguage" class="form-label">Bénéficiaire</label>
                                    <select class="form-select" id="input46" name="transporteur_uuid">
                                        <option selected value="{{ $facture->transporteur->uuid }}">{{ $facture->transporteur->raison_sociale }}</option>

                                        @foreach ($prestatairesTransports as $prestatairesTransport)
                                            <option value="{{ $prestatairesTransport->uuid }}" class="transporteur-option">{{ $prestatairesTransport->raison_sociale }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6 row">
                                    <div class="col-8">
                                        <label for="num_blTransport" class="form-label">N° BL</label>
                                        <input type="text" class="form-control" id="num_blTransport" name="num_blTransport" value="{{ $facture->num_blTransport }}">
                                    </div>
                                    <div class="col-4">
                                        <label for="file_BlTransport" class="form-label">Doc BL</label>
                                        <input type="file" class="form-control" id="file_BlTransport" name="file_BlTransport" value="{{ $facture->file_BlTransport }}">
                                    </div>
                                </div>


                                <div class="form-group mt-4">
                                    <hr>
                                    <div class="col-12 my-2 row text-start size_12 d-flex justify-content-between bold">
                                        <div class="col-3">RUBRIQUE</div>
                                        <div class="col-3">MONTANT HT (Fcfa)</div>
                                        <div class="col-2">TAXES (%)</div>
                                        <div class="col-3">MONTANT TTC (Fcfa)</div>
                                    </div>
                                    <hr>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="PRESTATION">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtTpPres" name="montantHtTpPres" value="{{ $facture->montantHtTpPres }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaTpPres" name="tvaTpPres" value="{{ $facture->tvaTpPres }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcTpPres" name="montantTtcTpPres" value="{{ $facture->montantTtcTpPres }}">
                                        </div>
                                    </div>
                                    <div class="row mt-2 d-flex justify-content-between align-items-center align-self-center py-auto">
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled placeholder="AUTRES">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantHtTpAutr" name="montantHtTpAutr" value="{{ $facture->montantHtTpAutr }}">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control form-control-sm" id="tvaTpAutr" name="tvaTpAutr" value="{{ $facture->tvaTpAutr }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-sm" id="montantTtcTpAutr" name="montantTtcTpAutr" value="{{ $facture->montantTtcTpAutr }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                        @endif

                    </div>
                    <div class="col-12 col-lg-6">
                        <button type="submit" class="btn btn-primary px-4">Modifier<i
                                class='bx bx-right-arrow-alt ms-2'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

