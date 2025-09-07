<?php

namespace App\Filament\Resources\OurProviders\Pages;

use App\Filament\Resources\OurProviders\OurProviderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOurProvider extends EditRecord
{
    protected static string $resource = OurProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
