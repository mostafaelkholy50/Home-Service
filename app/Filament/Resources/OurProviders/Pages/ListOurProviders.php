<?php

namespace App\Filament\Resources\OurProviders\Pages;

use App\Filament\Resources\OurProviders\OurProviderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOurProviders extends ListRecords
{
    protected static string $resource = OurProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
