<?php

namespace App\Filament\Admin\Resources\ItemResource\Pages;

use App\Filament\Admin\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    
    // public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    // {

    
    //     // Ensure the location field exists and has lat/lng values
    //     $location = $this->data['location'] ?? null;
        
    //     if ($location) {
    //         $latitude = $location['lat'];
    //         $longitude = $location['lng'];
            
    //         // Now assign the latitude and longitude values
    //         $this->record->latitude = $latitude;
    //         $this->record->longitude = $longitude;
    //         $this->record->location = $location; // You can keep the 'location' field as well if needed
            
    //         // Save the record
    //         $this->record->save();
    //     } else {
    //         // Handle case where location is not set
    //         // dd('Location data not found.');
    //     }
    
    //     // Optionally call the parent save method to preserve redirect and notification behavior
    //     parent::save($shouldRedirect, $shouldSendSavedNotification);
    // }
}
