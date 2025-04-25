<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class LeafletMap extends Field
{
    protected string $view = 'forms.components.leaflet-map';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (LeafletMap $component, $state) {
            // Check if state is already set
            if (is_array($state) && isset($state['lat'], $state['lng'])) {
                return;
            }

            $record = $component->getRecord();

            if ($record && $record->latitude && $record->longitude) {
                $component->state([
                    'lat' => $record->latitude,
                    'lng' => $record->longitude,
                ]);
            } else {
                $component->state([
                    'lat' => -7.797068,
                    'lng' => 110.370529,
                ]);
            }
        });

        $this->dehydrateStateUsing(function ($state) {
            return [
                'lat' => (float) ($state['lat'] ?? -7.797068),
                'lng' => (float) ($state['lng'] ?? 110.370529),
            ];
        });

        $this->afterStateUpdated(function (LeafletMap $component, $state) {
            // Useful for debugging
            logger()->info('Updated location state:', $state);
        });
    }
}
