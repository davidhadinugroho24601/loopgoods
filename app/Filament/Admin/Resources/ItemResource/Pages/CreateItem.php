<?php

namespace App\Filament\Admin\Resources\ItemResource\Pages;

use App\Filament\Admin\Resources\ItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);

        $data['stock'] = $data['quantity'];
        // $data['location'] = '-';
        // $data['user_id'] = auth()->id();
        // dd(session());
        return $data;
    }
}
