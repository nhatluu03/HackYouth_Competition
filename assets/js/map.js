var map;

function initMap() {
  const providedLocation = { lat: -34.397, lng: 150.644 };
  const locations = [
    [{ lat: -35.397, lng: 151.644 }, { name: "bv 1" }],
    [{ lat: -36.397, lng: 152.644 }, { name: "bv 2" }],
    [{ lat: -37.397, lng: 153.64 }, { name: "bv 3" }],
  ];

  const map = new google.maps.Map(document.getElementById("map"), {
    center: providedLocation,
    zoom: 16,
  });
  const marker = new google.maps.Marker({
    map: map,
    position: providedLocation,
  });

  document.getElementById("location-input").onclick = function () {
    let map1 = document.getElementById("map");
    map1.style.display = "block";
  };

  // Initialize the autocomplete input field
  const input = document.getElementById("location-input");
  const autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.addListener("place_changed", function () {
    var place = autocomplete.getPlace();
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
    if (document.body.contains(document.querySelector(".edit-hospital-form"))) {
      document.querySelector("#edit-hospital-latitude").value = lat;
      document.querySelector("#edit-hospital-longitude").value = lng;
    } else if (
      document.body.contains(document.querySelector(".edit-donor-form"))
    ) {
      document.querySelector("#edit-donor-latitude").value = lat;
      document.querySelector("#edit-donor-longitude").value = lng;
    }
    console.log("Latitude: " + lat + ", Longitude: " + lng);
  });

  // Add a listener to update the map and marker when a place is selected
  autocomplete.addListener("place_changed", () => {
    const place = autocomplete.getPlace();
    if (place.geometry) {
      map.panTo(place.geometry.location);
      marker.setPosition(place.geometry.location);
    }
  });

  if (document.body.contains(document.querySelector("#book-donation-centre-id"))) {
    document.querySelector("#book-donation-centre-id").onclick = function () {
      var disArr = [];
      locations.forEach((location) => {
        const distance = google.maps.geometry.spherical.computeDistanceBetween(
          new google.maps.LatLng(location[0]),
          new google.maps.LatLng(providedLocation)
        );
        disArr.push([location[1].name, distance]);
      });
      disArr.sort(function (a, b) {
        return a[1] - b[1];
      });
      console.log(disArr);
    };
  }

}

function locationToLatLng() {}

function getLatLng(address) {
  var geocoder = new google.maps.Geocoder();
  var lat;
  var lng;
  var res = geocoder.geocode({ address: address }, function (results, status) {
    if (status === "OK") {
      lat = results[0].geometry.location.lat();
      lng = results[0].geometry.location.lng();
      console.log(lat);
      return { lat: lat, lng: lng };
    } else {
      console.log("Baby this is why you are wrong: " + status);
    }
  });
  return res;
}

// Find the nearest location to the provided location
function findNearest(locationLst, locationPrved) {
  // let nearestLocation;
  // let nearestDistance = Infinity;
  var disArr = [];
  locationLst.forEach((location) => {
    const distance = google.maps.geometry.spherical.computeDistanceBetween(
      new google.maps.LatLng(location[0]),
      new google.maps.LatLng(locationPrved)
    );
    disArr.push([location[1].name, distance]);
  });
  disArr.sort(function (a, b) {
    return a[1] - b[1];
  });
  console.log(disArr);
  // console.log(disArr.slice(0, 3));
}

// Ham lay lat lng tu cai place trong input
function getAddress(lat, lng) {
  var geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(lat, lng);
  var options = {
    latLng: latlng,
  };

  geocoder.geocode(options, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      var address = results[0].formatted_address;
      console.log(address);
    } else {
      console.error("Geocoding was not successful: " + status);
    }
  });
}

//   });

// function findNearest(locations, providedLocation) {
//   let nearestLocation;
//   let nearestDistance = Infinity;
//   var disArr = [];
//   locations.forEach((location) => {
//     const distance = google.maps.geometry.spherical.computeDistanceBetween(
//       new google.maps.LatLng(location[0]),
//       new google.maps.LatLng(providedLocation)
//     );
//     if (distance < nearestDistance) {
//       nearestLocation = location;
//       nearestDistance = distance;
//     }
//     console.log(distance);
//   });
// }
