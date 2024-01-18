<div class="modal fade"  id="editFacture{{ $item->uuid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modification de la facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="stepper11" class="bs-stepper">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-lg-flex flex-lg-row align-items-lg-center justify-content-lg-between"
                                role="tablist">
                                <div class="step" data-target="#test-l-11">
                                    <div class="step-trigger" role="tab" id="stepper11trigger11" aria-controls="test-l-11">
                                        <div class="bs-stepper-circle">1</div>
                                        <div class="">
                                            <h5 class="mb-0 steper-title">Beneficiaire</h5>
                                            <p class="mb-0 steper-sub-title">Entrer les details du fournisseur</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-22">
                                    <div class="step-trigger" role="tab" id="stepper11trigger22" aria-controls="test-l-22">
                                        <div class="bs-stepper-circle">2</div>
                                        <div class="">
                                            <h5 class="mb-0 steper-title">Marchandises</h5>
                                            <p class="mb-0 steper-sub-title">Detail des marchandises</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-33">
                                    <div class="step-trigger" role="tab" id="stepper11trigger33" aria-controls="test-l-33">
                                        <div class="bs-stepper-circle">3</div>
                                        <div class="">
                                            <h5 class="mb-0 steper-title">Prestation</h5>
                                            <p class="mb-0 steper-sub-title">Detail des Prestations</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-44">
                                    <div class="step-trigger" role="tab" id="stepper11trigger44" aria-controls="test-l-44">
                                        <div class="bs-stepper-circle">4</div>
                                        <div class="">
                                            <h5 class="mb-0 steper-title">ID Facturier</h5>
                                            <p class="mb-0 steper-sub-title">Detail sur le responsable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                                <div class="bs-stepper-content">
                                <form action="{{ route('admin.refacturation.update', $item->uuid) }}" method="post" class="submitForm" enctype="multipart/form-data" >
                                        @csrf
                                        <div id="test-l-11" role="tabpanel1" class="bs-stepper-pane2"
                                            aria-labelledby="stepper11trigger11">
                                            <div class="">
                                            <h5 class="mb-0 steper-title">Beneficiaire</h5>
                                            <p class="mb-0 steper-sub-title">Entrer les details du fournisseur</p>
                                        </div>
                                        <hr>
                                        <br>
                                            <div class="row g-3">
                                                <div class="col-12 col-lg-6">
                                                    <label for="refClient" class="form-label">Ref Client</label>
                                                    <input type="text" class="form-control" value="{{ $item->refClient ?? 'N/A'  }}" id="refClient" name="refClient"
                                                        placeholder="Ref Client">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_cc" class="form-label">N° Client</label>
                                                    <input type="text" class="form-control" id="num_cc" value="{{ $item->num_cc ?? 'N/A'  }}" name="num_cc"
                                                        placeholder="cc012ff879">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="adresseComplete" class="form-label">Adresse Complete</label>
                                                    <input type="text" class="form-control" value="{{ $item->adresseComplete ?? 'N/A'  }}" id="adresseComplete"
                                                        name="adresseComplete" placeholder="Adresse Complete">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="email" class="form-label">E-mail Address</label>
                                                    <input type="text" class="form-control" value="{{ $item->email ?? 'N/A'  }}" id="email" name="email"
                                                        placeholder="example@xyz.com">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="pol" class="form-label">Pol</label>
                                                    <input type="text" id="pol" class="form-control" value="{{ $item->pol ?? 'N/A'  }}" name="pol">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="pod" class="form-label">PoD</label>
                                                    <input type="text" id="pod" class="form-control" value="{{ $item->pod ?? 'N/A'  }}" name="pod">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="regime" class="form-label">Regime</label>
                                                    <input type="text" id="regime" class="form-control" value="{{ $item->regime ?? 'N/A'  }}" name="regime">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="doit" class="form-label">Doit</label>
                                                    <input type="text" class="form-control" id="doit" value="{{ $item->doit ?? 'N/A'  }}" name="doit"
                                                        placeholder="Doit">
                                                </div>

                                                <!--<div class="col-12 col-lg-6">
                                                    <button class="btn btn-primary px-4" onclick="event.preventDefault(); stepper11.next()">Suivant<i class='bx bx-right-arrow-alt ms-2'></i></button>
                                                  </div>-->
                                            </div>
                                            <!---end row-->

                                        </div>
                                        <hr>
                                             <br>
                                        <div id="test-l-22" role="tabpanel1" class="bs-stepper-pane2"
                                            aria-labelledby="stepper11trigger22">
                                            <div class="">
                                            <h5 class="mb-0 steper-title">Marchandises</h5>
                                            <p class="mb-0 steper-sub-title">Detail des marchandises</p>
                                           </div>
                                           <hr>
                                           <br>
                                            <div class="row g-3">
                                                <div class="col-12 col-lg-6">
                                                    <label for="designation" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" id="designation" value="{{ $item->designation ?? 'N/A'  }}"
                                                        name="designation" placeholder="Groupe Electrogene">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_Commande" class="form-label">N° Commande</label></label>
                                                    <input type="text" class="form-control" id="num_Commande" value="{{ $item->num_Commande ?? 'N/A'  }}"
                                                        name="num_Commande" placeholder="cmd023564">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_Bl" class="form-label">N° Bon Livraison</label>
                                                    <input type="text" class="form-control" id="num_Bl" value="{{ $item->num_Bl ?? 'N/A'  }}" name="num_Bl"
                                                        placeholder="cmd023564">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="navire" class="form-label">Navire/Voyage</label>
                                                    <input type="text" class="form-control" id="navire" value="{{ $item->navire ?? 'N/A'  }}" name="navire"
                                                        placeholder="navire xxxx">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="destination" class="form-label">Destination</label>
                                                    <input type="text" class="form-control" id="destination" value="{{ $item->destination ?? 'N/A'  }}"
                                                        placeholder="destination" name="destination">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="amateur" class="form-label">Amateur</label>
                                                    <input type="text" class="form-control" id="amateur" value="{{ $item->amateur ?? 'N/A'  }}"
                                                        placeholder="amateur" name="amateur">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_Dossier" class="form-label">N° Dossier</label>
                                                    <input type="text" class="form-control" id="num_Dossier" value="{{ $item->num_Dossier ?? 'N/A'  }}"
                                                        placeholder="N° Dossier" name="num_Dossier">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_Ot" class="form-label">N° OT</label>
                                                    <input type="text" class="form-control" id="num_Ot" placeholder="N° OT" value="{{ $item->num_Ot ?? 'N/A'  }}"
                                                        name="num_Ot">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="volume" class="form-label">Volume</label>
                                                    <input type="text" class="form-control" id="volume" placeholder="volume" value="{{ $item->volume ?? 'N/A'  }}"
                                                        name="volume">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="tva" class="form-label">tva (%)</label>
                                                    <input type="text" class="form-control" id="tva" placeholder="% TVA"
                                                        name="tva">
                                                </div>
                                               <!--<div class="col-12">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <button class="btn btn-outline-secondary px-4"
                                                        onclick="event.preventDefault(); stepper11.previous()"><i
                                                                class='bx bx-left-arrow-alt me-2'></i>Retour</button>
                                                        <button class="btn btn-primary px-4"
                                                        onclick="event.preventDefault(); stepper11.next()">Suivant<i
                                                                class='bx bx-right-arrow-alt ms-2'></i></button>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <!---end row-->

                                        </div>
                                        <hr>
                                             <br>
                                        <div id="test-l-33" role="tabpanel1" class="bs-stepper-pane2"
                                            aria-labelledby="stepper11trigger33">
                                            <div class="">
                                            <h5 class="mb-0 steper-title">Prestation</h5>
                                            <p class="mb-0 steper-sub-title">Detail des Prestations</p>
                                         </div>
                                         <hr>
                                         <br>
                                            <div class="row g-3">
                                                <div id="prestationss">
                                                    <div class="prestationss mb-2">
                                                        <div class="">
                                                            @php
                                                                $prestations = DB::table('facture_prestations')->where(['facture_uuid'=>$item->uuid])->where(['etat'=>"actif"])->get();
                                                            @endphp
                                                            @forelse ($prestations as $prestation )
                                                                @if($prestation)

                                                                <div class="col my-3 row flex-row">

                                                                    <div class="col-3">
                                                                        <input type="text" class="form-control" placeholder="{{ $prestation->type_prestation ?? 'N/A'  }}" disabled>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <input placeholder="{{ $prestation->qty ?? 'N/A'  }}" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <input placeholder="{{ $prestation->description ?? 'N/A'  }}" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <input placeholder="{{ $prestation->prixunitaire ?? 'N/A'  }}" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <input placeholder="{{ $prestation->total ?? 'N/A'  }}" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                        <form action="{{ route('admin.delete.prestationLine', $prestation->uuid) }}" method="post" class="submitForm">
                                                                            @csrf

                                                                            <input type="hidden" name="facture_uuid" value="{{ $item->uuid }}">
                                                                            <button type="submit" class="btn btn-danger px-2 text-center"><i class='bx bxs-trash'></i></button>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @empty
                                                            <div>Aucune Facture enregistré</div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="prestationsEdit">
                                                    <div class="prestationsEdit mb-2">
                                                        <div class="form-row row">
                                                            <div class="col-3">
                                                                <select name="type_prestation[]" class="form-control">
                                                                <option value="">Sélect le type</option>
                                                                <option value="prestation">PRESTATION</option>
                                                                <option value="debours">DEBOURS</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-1">
                                                                <input type="number" name="qty[]" class="form-control"
                                                                    placeholder="0">
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" name="description[]" class="form-control"
                                                                    placeholder="Description">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="number" name="prixunitaire[]"
                                                                    class="form-control" placeholder="Prix unitaire">
                                                            </div>
                                                            <div class="col-2">
                                                                <input type="number" name="total[]" class="form-control"
                                                                    placeholder="Total" readonly>
                                                            </div>
                                                            <div class="col-auto">

                                                                <button type="button" class="btn btn-danger remove-btnb px-2 text-center"><i class='bx bxs-trash remove-btnb'></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary col-3" onclick="cloneBlockEditPrestation()"><i class="bx bxs-plus-square"></i> Ajouter une prestation</button>
                                                <hr>
                                            </div>
                                            <!---end row-->

                                        </div>
                                        <hr>
                                        <br>

                                        <div id="test-l-44" role="tabpanel1" class="bs-stepper-pane2"
                                            aria-labelledby="stepper11trigger44">
                                            <div class="">
                                            <h5 class="mb-0 steper-title">ID Facturier</h5>
                                            <p class="mb-0 steper-sub-title">Detail sur le responsable</p>
                                             </div>
                                             <hr>
                                             <br>
                                            <div class="row g-3">
                                                <div class="col-12 col-lg-6">
                                                    <label for="facturier_uuid" class="form-label">Facturier</label>
                                                    <input type="text" class="form-control" id="facturier_uuid"
                                                        placeholder="{{ Auth::user()->name.' '.Auth::user()->lastname }}" readonly>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="poste_occuper" class="form-label">Poste</label>
                                                    <input type="text" class="form-control" id="poste_occuper" value="{{ $item->poste_occuper ?? 'N/A'  }}"
                                                        placeholder="Poste Occuper" name="poste_occuper">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="num_facture" class="form-label">N° Facture</label>
                                                    <input type="text" class="form-control" id="num_facture" value="{{ $item->num_facture ?? 'N/A'  }}"
                                                        placeholder="fact 001205v 01" name="num_facture">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <label for="date_echeance" class="form-label">Date d'écheance</label>
                                                    <input type="date" class="form-control" id="date_echeance" value="{{ $item->date_echeance ?? 'N/A'  }}"
                                                        name="date_echeance">
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <label for="condition_paiement" class="form-label">Condition de paiement</label>
                                                    <textarea class="form-control" name="condition_paiement" id="condition_paiement" cols="30" rows="3">{{ $item->condition_paiement ?? 'N/A'  }}</textarea>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <!--<button class="btn btn-primary px-4"
                                                            onclick="event.preventDefault(); stepper11.previous()"><i
                                                                class='bx bx-left-arrow-alt me-2'></i>Retour</button>-->
                                                        <button type="submit" class="btn btn-success px-4"
                                                            >Enregistrer</button>
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
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>-->
                {{-- <button type="button" class="btn btn-primary">Sauvegarder changements</button> --}}
            </div>
        </div>
    </div>

</div>


<script>

function cloneBlockEditPrestation() {
    const block = document.querySelector(".prestationsEdit");
    // Clone le bloc de prestation
    const clone = block.cloneNode(true);
    document.querySelector('#prestationsEdit').appendChild(clone);
    }
</script>
