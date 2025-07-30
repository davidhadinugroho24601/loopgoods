<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Request;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RequestTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Recent Requests';

    protected function getTableQuery(): Builder
    {
        $query = Request::query()
            ->latest()
            ->limit(10);

        if (auth()->user()?->role !== 'admin') {
            $query->where('recipient_id', auth()->id());
        }

        return $query;
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('sender.name')->label('Sender'),
            TextColumn::make('recipient.name')->label('Recipient')->sortable(),
            TextColumn::make('item.name')->label('Item'),
            TextColumn::make('quantity'),

            IconColumn::make('status')
                ->label('Status')
                ->icon(fn ($record) => match ($record->status) {
                    'accepted' => 'heroicon-o-check-circle',
                    'declined' => 'heroicon-o-x-circle',
                    default => 'heroicon-o-paper-airplane',
                })
                ->color(fn ($record) => match ($record->status) {
                    'accepted' => 'success',
                    'declined' => 'danger',
                    default => 'primary',
                })
                ->tooltip(fn ($record) => ucfirst($record->status)),
        ];
    }

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }


// RequestTableWidget.php
public static function getSort(): int
{
    return 3; // Bottom
}

}
