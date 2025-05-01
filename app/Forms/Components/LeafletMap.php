<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class LeafletMap extends Field
{
    // use HasPlaceholder;
    protected string $view = 'forms.components.leaflet-map';
    public function getScripts(): array
    {
        return [
            'https://unpkg.com/leaflet/dist/leaflet.js', // Leaflet JS CDN
        ];
    }

    public function getStyles(): array
    {
        return [
            'https://unpkg.com/leaflet/dist/leaflet.css', // Leaflet CSS CDN
        ];
    }
   
}
