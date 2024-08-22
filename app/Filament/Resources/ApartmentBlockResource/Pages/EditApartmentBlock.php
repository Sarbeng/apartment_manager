<?php

namespace App\Filament\Resources\ApartmentBlockResource\Pages;

use App\Filament\Resources\ApartmentBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApartmentBlock extends EditRecord
{
    protected static string $resource = ApartmentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
