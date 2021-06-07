<div>
    @include('partials.flash-messages')

    @error('company_id')
        <div role="alert">
            <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                <p>{{ $message }}</p>
            </div>
        </div>
    @enderror

    @if ($view)
        @include("livewire.companies.company-$view")
    @endif

    @include('livewire.companies.company-table')

    @section('scripts')
        <script src="https://maps.googleapis.com/maps/api/js?key={{ ENV('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
        <script src="/js/map.js"></script>
    @endsection
</div>
