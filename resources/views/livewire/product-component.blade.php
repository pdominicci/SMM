<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Products') }}
    </h2>

    @if ( session('mensaje') )
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
</x-slot>

<div>
    @if ($view)
        <div>
            @include("livewire.$view")
        </div>
    @endif

    @include('livewire.table')
</div>

