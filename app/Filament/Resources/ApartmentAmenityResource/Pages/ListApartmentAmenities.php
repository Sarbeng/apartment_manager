<?php

namespace App\Filament\Resources\ApartmentAmenityResource\Pages;

use App\Filament\Resources\ApartmentAmenityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApartmentAmenities extends ListRecords
{
    protected static string $resource = ApartmentAmenityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
