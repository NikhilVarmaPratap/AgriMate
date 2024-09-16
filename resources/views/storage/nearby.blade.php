<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nearby Storages</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Find Nearby Storages</h1>
    <div id="map"></div>

    <script>
        function initMap() {
            // Set the default location (e.g., current farmer's location)
            const farmerLocation = { lat: -34.397, lng: 150.644 };

            const map = new google.maps.Map(document.getElementById('map'), {
                center: farmerLocation,
                zoom: 12,
            });

            const service = new google.maps.places.PlacesService(map);

            // Find nearby storage facilities
            service.nearbySearch(
                { location: farmerLocation, radius: 5000, type: ['storage'] },
                (results, status) => {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        results.forEach((place) => {
                            new google.maps.Marker({
                                position: place.geometry.location,
                                map,
                                title: place.name,
                            });
                        });
                    }
                }
            );
        }

        // Initialize the map
        window.onload = initMap;
    </script>
</body>
</html>
