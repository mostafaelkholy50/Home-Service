<?php

namespace App\Filament\Resources\OurProviders\Pages;

use App\Filament\Resources\OurProviders\OurProviderResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOurProvider extends ViewRecord
{
    protected static string $resource = OurProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
