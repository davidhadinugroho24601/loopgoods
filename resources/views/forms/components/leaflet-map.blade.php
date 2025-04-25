<div id="leaflet-map" style="height: 400px;"></div>

<script>
    document.addEventListener('livewire:load', function () {
        let map = L.map('leaflet-map').setView([{{ $lat }}, {{ $lng }}], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([{{ $lat }}, {{ $lng }}], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function (e) {
            let position = marker.getLatLng();
            @this.set('latitude', position.lat.toFixed(7));
            @this.set('longitude', position.lng.toFixed(7));
        });

        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            @this.set('latitude', e.latlng.lat.toFixed(7));
            @this.set('longitude', e.latlng.lng.toFixed(7));
        });
    });
</script>
