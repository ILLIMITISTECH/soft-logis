<div class="modal fade" id="addEntrepotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un entrepot</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.stock_entrepot.store') }}" method="post" class="submitForm">
                <div class="modal-body my-4">
                    @csrf

                    <div class="row">
                        <div class="form-group col">
                            <label for="">Nom</label>
                            <input class="form-control" type="text" name="nom" autocomplete="off">
                        </div>
                        <div class="form-group col">
                            <label for="">Couleur</label>
                            <input class="form-control" type="color" name="color" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="">Emplacement</label>
                            <input class="form-control" type="text" name="emplacement" autocomplete="off">
                        </div>
                        <div class="form-group col">
                            <label for="">Capacité</label>
                            <input class="form-control" type="text" name="capacity" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description <span class="text-muted">(facultatif)</span></label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="2" autocomplete="off"></textarea>
                    </div>
                    <hr>

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Ajouter</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
