<div class="modal fade" id="productListModal{{ $sourcing->uuid }}" tabindex="-1" aria-labelledby="productListModalLabel{{ $sourcing->uuid }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productListModalLabel{{ $sourcing->id }}">Liste des Produits du Sourcing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if ($sourcing->products->count() > 0)
                    <ul class="list-group gy-2">
                        @foreach ($sourcing->products as $sourcingProduct)

                            <li class="list-group-item" id="productListBlock">
                                <div class="d-flex justify-content-between align-items-center">

                                    @if ($sourcingProduct->product != null)
                                    <a href="{{ route('admin.article.show', $sourcingProduct->product->uuid) }}" class="text-uppercase text-dark">{{ $sourcingProduct->product->libelle ?? '--'}}</a>
                                    <span>Quantité: {{ $sourcingProduct->qty }}</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun produit associé à ce sourcing.</p>
                @endif
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
