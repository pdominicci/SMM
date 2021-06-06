window.addEventListener('initialize', event => {
    var map = new google.maps.Map(
      document.getElementById("map"), {
        center: new google.maps.LatLng(37.4419, -122.1419),
        zoom: 13,
      });
      const geocoder = new google.maps.Geocoder();
      document.getElementById("submit").addEventListener("click", () => {
        geocodeAddress(geocoder, map);
      });

  })
    function geocodeAddress(geocoder, resultsMap) {
      const address = document.getElementById("address").value;
      console.log("address " + address)
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
      });
    }
