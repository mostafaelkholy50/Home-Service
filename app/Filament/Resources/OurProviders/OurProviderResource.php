<?php

namespace App\Filament\Resources\OurProviders;

use App\Filament\Resources\OurProviders\Pages\CreateOurProvider;
use App\Filament\Resources\OurProviders\Pages\EditOurProvider;
use App\Filament\Resources\OurProviders\Pages\ListOurProviders;
use App\Filament\Resources\OurProviders\Schemas\OurProviderForm;
use App\Filament\Resources\OurProviders\Tables\OurProvidersTable;
use App\Models\Our_Provider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OurProviderResource extends Resource
{
    protected static ?string $model = Our_Provider::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OurProviderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OurProvidersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOurProviders::route('/'),
            'create' => CreateOurProvider::route('/create'),
            'edit' => EditOurProvider::route('/{record}/edit'),
        ];
    }
}
