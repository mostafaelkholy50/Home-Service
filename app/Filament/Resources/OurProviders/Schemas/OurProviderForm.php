<?php

namespace App\Filament\Resources\OurProviders\Schemas;

use App\Models\User;
use App\Models\our_service;
use Filament\Schemas\Schema;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Relations\Relation;

class OurProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                select::make('user_id')
                    ->options(function ($record = null) {
                        // Get all Providers who don't have a provider entry yet
                        $query = User::where('role', 'Provider')->doesntHave('providers');

                        // If it's an update, include the current user in the options list
                        if ($record) {
                            $query->orWhere('id', $record->user_id);
                        }
                        return $query->pluck('name', 'id');
                    })
                    ->required()
                    ->unique(ignoreRecord: true), // Make it unique and ignore the current record

                select::make('service_id')
                    ->options(function () {
                        return our_service::all()->pluck('name', 'id');
                    })
                    ->required(),

                TextInput::make('price')
                    ->required()
                    ->prefix('EGP')
                    ->numeric(),

                TextInput::make('phone')
                    ->required()
                    ->prefix('+20')
                    ->tel()
                    ->unique(ignoreRecord: true), // Correctly ignores the current record on update

                TextInput::make('description')->required(),

            ]);
    }
}
