<?php

namespace App\Filament\Resources\OurProviders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\Relation;
use function Laravel\Prompts\select;
use Filament\Tables\Columns\SelectColumn;

class OurProvidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Provider Name')->searchable()->sortable(),
                TextColumn::make('service.name')->label('Service')->searchable()->sortable(),
                TextColumn::make('price')->label('Price')->prefix('EGP')->sortable(),
                TextColumn::make('phone')->label('Phone')->prefix('+20')->sortable(),
                TextColumn::make('description')->label('Description')->limit(50)->sortable(),
                // Add more columns as needed
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
