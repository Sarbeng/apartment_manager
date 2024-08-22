<?php

namespace App\Filament\Resources\ApartmentAmenityResource\Pages;

use App\Filament\Resources\ApartmentAmenityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApartmentAmenity extends EditRecord
{
    protected static string $resource = ApartmentAmenityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
