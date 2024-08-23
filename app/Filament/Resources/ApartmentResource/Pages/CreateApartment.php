<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Filament\Resources\ApartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApartment extends CreateRecord
{
    protected static string $resource = ApartmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array{
        $data['user_id'] = "John";


        return $data;
    }
}
