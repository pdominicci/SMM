<div>
    @include('partials.flash-messages')

    @error('company_id')
        <div role="alert">
            <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                <p>{{ $message }}</p>
            </div>
        </div>
    @enderror
    {{-- <div class="">@include("livewire.companies.company-create")</div> --}}

    <div id='map_container'>
    @if ($view)

            @include("livewire.companies.company-$view")

    @endif
    </div>

    @include('livewire.companies.company-table')


    @section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ ENV('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
<script src="/js/map.js"></script>
<script>

// window.addEventListener('initialize', event => {
//   var map = new google.maps.Map(
//     document.getElementById("map"), {
//       center: new google.maps.LatLng(37.4419, -122.1419),
//       zoom: 13,
//     });
//     const geocoder = new google.maps.Geocoder();
//     document.getElementById("submit").addEventListener("click", () => {
//       geocodeAddress(geocoder, map);
//     });

// })
//   function geocodeAddress(geocoder, resultsMap) {
//     const address = document.getElementById("address").value;
//     console.log("address " + address)
//     geocoder.geocode({ address: address }, (results, status) => {
//       if (status === "OK") {
//         resultsMap.setCenter(results[0].geometry.location);
//         new google.maps.Marker({
//           map: resultsMap,
//           position: results[0].geometry.location,
//         });
//       } else {
//         alert("Geocode was not successful for the following reason: " + status);
//       }
//     });
//   }
</script>
@endsection

</div>
