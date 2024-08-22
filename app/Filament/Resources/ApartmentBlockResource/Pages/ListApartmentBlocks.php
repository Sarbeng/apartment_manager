<?php

namespace App\Filament\Resources\ApartmentBlockResource\Pages;

use App\Filament\Resources\ApartmentBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApartmentBlocks extends ListRecords
{
    protected static string $resource = ApartmentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
