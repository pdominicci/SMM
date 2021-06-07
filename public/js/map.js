window.addEventListener('initialize', event => {
    var resultsMap = initMap();

    // const geocoder = new google.maps.Geocoder();
    // document.getElementById("submit").addEventListener("click", () => {
    // geocodeAddress(geocoder, map);
    // });
})
function initMap(){
    var map = new google.maps.Map(
        document.getElementById("map"), {
        center: new google.maps.LatLng(37.4419, -122.1419),
        zoom: 13,

    });
    return map;
}
window.addEventListener('geocodeAddress', event => {
    console.log('a');
    var resultsMap = initMap();
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

