<div class="modal fade" id="docModal{{$facture->uuid}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @php $facture_original = "files/"; $var = $facture->facture_original; $cum = $facture_original.$var; @endphp

                @if($cum)
                <iframe src='{{ asset($cum) }}' width="100%" height="600"></iframe>
                @else

                @endif

                <div id="pdfContainer">

                </div>
            </div>
        </div>
    </div>
</div>
