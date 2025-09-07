<?php

namespace App\Filament\Resources\OurServices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OurServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('services')
                    ->image(),
            ]);
    }
}
