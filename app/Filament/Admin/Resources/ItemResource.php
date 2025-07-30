<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ItemResource\Pages;
use App\Filament\Admin\Resources\ItemResource\RelationManagers;
use App\Filament\Admin\Resources\ItemResource\RelationManagers\GalleryRelationManager;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\ViewField;
use App\Forms\Components\LeafletMap;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Hidden;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Filament\Facades\Filament;
use Carbon\Carbon;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                
                Textarea::make('description')->required(),
                
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                

                Select::make('user_id')
                ->relationship('user', 'name')
                ->label('Owner')
                ->required()
                ->default(fn () => Filament::auth()->user()?->id)
                ->disabled(fn () => Filament::auth()->user()?->role !== 'admin')
                ->dehydrated(true), // <-- this forces it to be saved

                
                TextInput::make('quantity')
                ->type('number')
                ->label('Quantity')
                ->minValue(1)
                ->default(1)
                ->required(),


                TextInput::make('max_request')
                    ->type('number')
                    ->label('Maximum Request')
                    ->minValue(0)
                    ,

                TextInput::make('stock')
                    ->type('number')
                    ->label('Stock')
                    ->minValue(0)
                    ->visible(fn (string $context) => $context === 'edit')->disabled(),
                
                Textarea::make('address')->required(),
        
                LeafletMap::make('location')
                ->label('Location')
                ->columnSpanFull()
                ->extraAttributes(['class' => '!border-none !shadow-none !border-t-0'])
                ->required(fn (string $context) => $context === 'create')
                ->dehydrated(false),


                Hidden::make('latitude')
                // ->required(fn (string $context) => $context === 'create')
                ->dehydrateStateUsing(fn (callable $get) => json_decode($get('location'), true)['lat'] ?? null),

                Hidden::make('longitude')
                // ->required(fn (string $context) => $context === 'create')
                ->dehydrateStateUsing(fn (callable $get) => json_decode($get('location'), true)['lng'] ?? null),




                    // ViewField::make('map')
                    // ->label('Map')
                    // ->dehydrated(false)
                    // ->view(function (\Filament\Forms\Get $get) {
                    //     return view('components.leaflet-map', [
                    //         'lat' => $get('latitude') ?? -2.5489,
                    //         'lng' => $get('longitude') ?? 118.0149,
                    //     ]);
                    // }),
                
                    

                    // LeafletMap::make('location')
                    //     ->label('Location')
                    //     ->required()
                    //     ->default('51.505,-0.09'),
                    
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('quantity')->label('Quantity'),
                TextColumn::make('max_request')->label('Maximum Request'),
                TextColumn::make('stock')->label('Available Stock'),
                // TextColumn::make('user.name')->label('Owner'),
                // BadgeColumn::make('status')
                //     ->colors([
                //         'success' => 'available',
                //         'danger' => 'taken',
                //     ]),

            TextColumn::make('created_at')
                ->label('Created At')
                ->formatStateUsing(fn ($state) => Carbon::parse($state)
                    ->timezone('Asia/Jakarta')
                    ->translatedFormat('d F Y H:i') . ' WIB')
                ->sortable(),

            ])
            ->filters([
                // SelectFilter::make('status')
                //     ->options([
                //         'available' => 'Available',
                //         'taken' => 'Taken',
                //     ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('Export')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->openUrlInNewTab()
                    ->deselectRecordsAfterCompletion()
                    ->action(function (Collection $records) {
                        return response()->streamDownload(function () use ($records) {
                            echo Pdf::loadHTML(
                                Blade::render('filament.forms.pdf', ['records' => $records])
                            )->stream();
                        }, 'items.pdf');
                    }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            GalleryRelationManager::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
    
        if (auth()->user()?->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }
    
        return $query;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
