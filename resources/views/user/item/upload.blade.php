@extends('public-layouts.app')

@section('content')
<div class="text-black bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6 text-center">Upload Item</h2>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form starts here -->
    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Name:</label>
            <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-700">Description:</label>
            <textarea id="description" name="description" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="locationName" class="block text-lg font-medium text-gray-700">Place:</label>
            <textarea id="locationName" name="locationName" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required>{{ old('locationName') }}</textarea>
        </div>


        <div class="mb-4">
            <label for="location" class="block text-lg font-medium text-gray-700">Location:</label>
            <div id="map" style="height: 300px;"></div>
            <input type="hidden" id="location" name="location" value="{{ old('location') }}" required>
            <small class="text-gray-500">Click on the map to select your location</small>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-lg font-medium text-gray-700">Image:</label>
            <input type="file" id="image" name="image" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>


        <button type="submit" style="background-color: #FF2D20" class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Upload</button>
    </form>
</div>

<script>
    // Initialize the Leaflet map
    var map = L.map('map').setView([51.505, -0.09], 13); // Default to some coordinates

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker to show location if the user clicks on the map
    var marker;
    map.on('click', function (e) {
        var lat = e.latlng.lat;
        var lon = e.latlng.lng;

        // Remove previous marker
        if (marker) {
            map.removeLayer(marker);
        }

        // Add new marker
        marker = L.marker([lat, lon]).addTo(map);

        // Set the value of the location input field
        document.getElementById('location').value = lat + ',' + lon;
    });

    // Add Geocoder Search
    L.Control.geocoder({
        defaultMarkGeocode: false
    })
        .on('markgeocode', function (e) {
            var lat = e.geocode.center.lat;
            var lon = e.geocode.center.lng;

            // Move the map to the geocoded location
            map.setView([lat, lon], 13);

            // Remove previous marker
            if (marker) {
                map.removeLayer(marker);
            }

            // Add new marker
            marker = L.marker([lat, lon]).addTo(map);

            // Set the value of the location input field
            document.getElementById('location').value = lat + ',' + lon;
        })
        .addTo(map);
</script>

@endsection
