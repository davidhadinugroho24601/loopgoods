<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class LeafletMap extends Field
{
    protected string $view = 'forms.components.leaflet-map';

    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrateStateUsing(function ($state) {
            if (is_string($state)) {
                return json_decode($state, true);
            }
            return $state;
        });

        $this->afterStateHydrated(function (LeafletMap $component, $state) {
            if (is_array($state) && isset($state['lat'], $state['lng'])) {
                $component->state(json_encode($state));
            }
        });
    }

    public function getScripts(): array
    {
        return ['https://unpkg.com/leaflet/dist/leaflet.js'];
    }

    public function getStyles(): array
    {
        return ['https://unpkg.com/leaflet/dist/leaflet.css'];
    }
}
