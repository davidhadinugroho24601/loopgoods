<div id="map" style="height: 300px;"></div>

@push('scripts')
    <script>
        const map = L.map('map').setView([{{ old('latitude', $get('latitude') ?? -1.0) }}, {{ old('longitude', $get('longitude') ?? 120.0) }}], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        let marker = L.marker([map.getCenter().lat, map.getCenter().lng], { draggable: true }).addTo(map);

        marker.on('dragend', function (e) {
            const latlng = marker.getLatLng();
            document.querySelector('[name="latitude"]').value = latlng.lat;
            document.querySelector('[name="longitude"]').value = latlng.lng;
        });
    </script>
@endpush
