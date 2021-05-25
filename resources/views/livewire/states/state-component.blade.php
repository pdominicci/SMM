<div>
    @include('partials.flash-messages')

    @if ($view)
        <div>
            @include("livewire.states.state-$view")
        </div>
    @endif

    @include('livewire.states.state-table')
</div>
