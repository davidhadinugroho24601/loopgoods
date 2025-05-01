<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map with Form Input</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
        .form-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <!-- Form to submit latitude and longitude -->
    <div class="form-container">
        <form id="locationForm">
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" readonly>
            <br><br>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" readonly>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map and set the view (latitude, longitude, zoom level)
        var map = L.map('map').setView([51.505, -0.09], 13); // Coordinates for London

        // Add a tile layer to the map (OpenStreetMap in this case)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Initialize a marker to place on the map
        var marker = L.marker([51.505, -0.09]).addTo(map);

        // Set the form input values when the map is clicked
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Move the marker to the clicked location
            marker.setLatLng(e.latlng);

            // Update the form inputs
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });

        // Optional: Submit the form (You can process this further as needed)
        document.getElementById('locationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var lat = document.getElementById('latitude').value;
            var lng = document.getElementById('longitude').value;

            // Here you can process the form submission, e.g., sending data via AJAX, etc.
            console.log("Latitude: " + lat + ", Longitude: " + lng);
        });
    </script>

</body>
</html>
