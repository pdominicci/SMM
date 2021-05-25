
<div>
    {{-- ESTO ASI ANDA
    @if ($message = Session::get('success'))
        <div class="fixed top-0 right-0 inset-x-0 mb-6 mx-6 px-6 py-5 max-w-sm rounded-lg pointer-events-auto bg-green-500 text-white">
            {{ $message }}
        </div>
    @endif --}}

    @include('partials.flash-messages')

    @if ($view)
        <div>
            @include("$view")
        </div>
    @endif

    @include('livewire.countries.country-table')
</div>

