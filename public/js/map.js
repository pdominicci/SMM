function initMap(zoom){
    var map = new google.maps.Map(
        document.getElementById("map"), {
        zoom: zoom,
    });
    return map;
}
window.addEventListener('geocodeAddress', event => {
    var resultsMap = initMap(event.detail.zoom);
    const geocoder = new google.maps.Geocoder();
    const address = document.getElementById("address").value;
    geocoder.geocode({ address: address }, (results, status) => {
        if (status === "OK") {
            resultsMap.setCenter(results[0].geometry.location);
            new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location,
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    })
})

