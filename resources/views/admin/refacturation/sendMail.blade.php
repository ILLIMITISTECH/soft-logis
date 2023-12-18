<div class="modal fade" id="addSendMail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Envoyer la facture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="stronger">
                <form action="{{ route('admin.refacturation.send_facture') }}" method="POST" enctype="multipart/form-data" class="submitForm">
                    @csrf
                    <label>Mettez le mail du destinataire</label>
                    <input type="text" class="form-control" placeholder="Mettez le mail du destinataire" name="email" autocomplete="off">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
