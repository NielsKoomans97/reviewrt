<div class="carrousel" data-itemsize="{{ $itemSize }}">
    <button class="scroll-back"><x-icon icon-code="arrow-bar-left" /></button>
    {{ $slot }}
    <button class="scroll-forward"><x-icon icon-code="arrow-bar-right" /></button>
</div>