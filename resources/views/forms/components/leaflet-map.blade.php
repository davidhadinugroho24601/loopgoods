<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<style>
    #map {
        height: 400px;
        width: 100%;
         position: relative; /* or 'absolute' depending on layout */
        z-index: 0; /* Ensures it stays behind elements with z-index > 0 */

    }
</style>

@php
    $record = $getLivewire()->getRecord() ?? null;

    // Prepare coordinates for JS initialization (fallback to default if empty)
    $lat = $record && $record->latitude ? $record->latitude : -6.5971;
    $lng = $record && $record->longitude ? $record->longitude : 106.8060;
@endphp

<div>
    <input type="hidden" {{ $attributes->merge($getExtraAttributes())->merge([
        'wire:model' => $getStatePath(),
        'id' => $getId(),
    ]) }} />

    <div id="map"></div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const map = L.map('map').setView([{{ $lat }}, {{ $lng }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const input = document.getElementById(@js($getId()));
        let marker;

        // Try loading old state from hidden input value
        try {
            const state = JSON.parse(input.value);
            if (state?.lat && state?.lng) {
                map.setView([state.lat, state.lng], 13);
                marker = L.marker([state.lat, state.lng]).addTo(map);
            }
        } catch {}

        // If no marker set yet, add one at default/record coordinates
        if (!marker) {
            marker = L.marker([{{ $lat }}, {{ $lng }}]).addTo(map);
            input.value = JSON.stringify({ lat: {{ $lat }}, lng: {{ $lng }} });
            input.dispatchEvent(new Event('input'));
        }

        map.on('click', function (e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            input.value = JSON.stringify({ lat, lng });
            input.dispatchEvent(new Event('input'));
        });

        // Add search control
        L.Control.geocoder({
            defaultMarkGeocode: false
        })
        .on('markgeocode', function(e) {
            const latlng = e.geocode.center;

            if (marker) {
                marker.setLatLng(latlng);
            } else {
                marker = L.marker(latlng).addTo(map);
            }

            map.setView(latlng, 13);
            input.value = JSON.stringify({ lat: latlng.lat, lng: latlng.lng });
            input.dispatchEvent(new Event('input'));
        })
        .addTo(map);
    });
</script>
