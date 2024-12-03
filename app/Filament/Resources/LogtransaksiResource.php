<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogtransaksiResource\Pages;
use App\Filament\Resources\LogtransaksiResource\RelationManagers;
use App\Models\Logtransaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogtransaksiResource extends Resource
{
    protected static ?string $model = Logtransaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Log Transaksi';

    protected static ?string $modelLabel = 'Log Transaksi';

    protected static ?string $navigationGroup = 'ADMIN MENU';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('transaksi_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'nama')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('paket')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('loc_catering')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('note')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\Select::make('payment_status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'cancel' => 'Cancel',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaksi_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('loc_catering')
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->searchable()
                    ->limit(15),
                Tables\Columns\TextColumn::make('price')
                    ->prefix('Rp ')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'cancel' => 'Cancel',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLogtransaksis::route('/'),
            'create' => Pages\CreateLogtransaksi::route('/create'),
            'edit' => Pages\EditLogtransaksi::route('/{record}/edit'),
        ];
    }
}
