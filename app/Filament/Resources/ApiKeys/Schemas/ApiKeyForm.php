<?php

namespace App\Filament\Resources\ApiKeys\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApiKeyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->maxLength(255)->required(),
                TextInput::make('key')->maxLength(255)->required()
            ]);
    }
}
