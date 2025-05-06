<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ChatResource\Pages;
use App\Models\Chat;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sender.name')
                    ->label('Sender')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('receiver.name')
                    ->label('Receiver')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('item.name')
                    ->label('Item')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Sent At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $latestChatsPerSender = Chat::selectRaw('MAX(id) as id')
            ->groupBy('sender_id');
    
        $query = parent::getEloquentQuery()
            ->whereIn('id', $latestChatsPerSender);
    
        if (auth()->user()?->role !== 'admin') {
            $query->where(function ($query) {
                $query->where('receiver_id', auth()->id())
                      ->orWhere('sender_id', auth()->id());
            });
        }
    
        return $query;
    }
    

}
