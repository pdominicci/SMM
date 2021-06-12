function initMap(zoom){
    var map = new google.maps.Map(
        document.getElementById("map"), {
        zoom: zoom,
    });
    console.log("aca");
    return map;
}
window.addEventListener('geocodeAddress', event => {
    var resultsMap = initMap(event.detail.zoom);
    const geocoder = new google.maps.Geocoder();
    const address = document.getElementById("address").value;
    console.log("aca1 address " + address);
    geocoder.geocode({ address: address }, (results, status) => {
        console.log("aca2");
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

