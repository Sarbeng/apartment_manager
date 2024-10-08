<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentBlockResource\RelationManagers\ApartmentsRelationManager;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Tenant;
use Filament\Forms\Form;
use App\Models\Apartment;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TenantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TenantResource\RelationManagers;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->options(User::whereNot('is_admin','=','1')->pluck('name','id'))
                    ->required()
                    ->searchable(),
                  Forms\Components\Select::make('apartment_id')
                    ->options(Apartment::whereNotNull('id')->pluck('apartment_number','id'))
                    ->required()
                    ->searchable(),
                Forms\Components\DateTimePicker::make('move_in_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('move_out_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('apartment_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('move_in_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('move_out_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ApartmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
