

<div>
    @include('partials.flash-messages')

    @if ($view)
        <div>
            @include("livewire.products.product-$view")
        </div>
    @endif

    @include('livewire.products.product-table')
</div>
