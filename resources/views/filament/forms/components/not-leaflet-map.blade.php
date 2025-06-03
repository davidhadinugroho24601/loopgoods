<x-filament::field-wrapper
    :label="$getLabel()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :helper-text="$getHelperText()"
    :state-path="$getStatePath()"
>
    <input type="hidden" name="latitude" value="{{ old('latitude', data_get($getState(), 0, '-1.0')) }}">
    <input type="hidden" style="color: black" name="longitude" value="{{ old('longitude', data_get($getState(), 1, '120.0')) }}">

    <div id="map" style="height: 300px;"></div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const latInput = document.querySelector('[name="latitude"]');
                const lngInput = document.querySelector('[name="longitude"]');

                const lat = parseFloat(latInput.value) || -1.0;
                const lng = parseFloat(lngInput.value) || 120.0;

                const map = L.map('map').setView([lat, lng], 5);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                }).addTo(map);

                let marker = L.marker([lat, lng], { draggable: true }).addTo(map);

                marker.on('dragend', function (e) {
                    const latlng = marker.getLatLng();
                    latInput.value = latlng.lat;
                    lngInput.value = latlng.lng;
                });
            });
        </script>
    @endpush
</x-filament::field-wrapper>
