<div>
    @include('partials.flash-messages')

    @error('country_id')
        <div role="alert">
            <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                <p>{{ $message }}</p>
            </div>
        </div>
    @enderror

    @if ($view)
        <div>
            @include("livewire.cities.city-$view")
        </div>
    @endif

    @include('livewire.cities.city-table')


</div>
