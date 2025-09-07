<?php

namespace App\Filament\Resources\OurServices\Pages;

use App\Filament\Resources\OurServices\OurServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOurServices extends ListRecords
{
    protected static string $resource = OurServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
