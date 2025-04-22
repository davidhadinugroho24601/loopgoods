<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RequestResource\Pages;
use App\Filament\Admin\Resources\RequestResource\RelationManagers;
use App\Models\Request;
use Filament\Forms;
use Filament\Components;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use App\Services\ItemService;
use Filament\Tables\Columns\IconColumn;

class RequestResource extends Resource
{
    protected static ?string $model = Request::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('sender_id')
                ->label('Sender')
                ->relationship('sender', 'name')
                ->searchable()
                ->preload()
                ->required(),
    
            Select::make('item_id')
                ->label('Item')
                ->relationship('item', 'name')
                ->searchable()
                ->preload()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.name'),
                TextColumn::make('item.name'),

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
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('accept')
                ->label('Accept')
                ->color('success')
                ->requiresConfirmation()
                ->icon('heroicon-o-check')
                ->action(function ($record, ItemService $itemService) {
                    $itemService->acceptRequest($record, 'accepted');
                })
                ->hidden(fn ($record) => in_array($record->status, ['accepted', 'declined'])),
            
            Action::make('decline')
                ->label('Decline')
                ->color('danger')
                ->requiresConfirmation()
                ->icon('heroicon-o-x-mark')
                ->action(function ($record, ItemService $itemService) {
                    $itemService->declineRequest($record, 'declined');
                })
                ->hidden(fn ($record) => in_array($record->status, ['accepted', 'declined'])),
            
    
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequests::route('/'),
            'create' => Pages\CreateRequest::route('/create'),
            'edit' => Pages\EditRequest::route('/{record}/edit'),
        ];
    }
}
