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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ambil record lama (yang sedang di-edit)
        $record = $this->getRecord();

        // Cek jika latitude kosong/null, pakai nilai lama
        if (empty($data['latitude'])) {
            $data['latitude'] = $record->latitude;
        }

        // Cek jika longitude kosong/null, pakai nilai lama
        if (empty($data['longitude'])) {
            $data['longitude'] = $record->longitude;
        }

        return $data;
    }

   
}
