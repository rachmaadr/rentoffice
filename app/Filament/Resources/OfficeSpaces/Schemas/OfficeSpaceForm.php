<?php

namespace App\Filament\Resources\OfficeSpaces\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OfficeSpaceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('officespace') // Folder di storage/app/public
                    ->preserveFilenames()
                    ->disk('public')
                    ->imagePreviewHeight('150') // Tambahkan ini
                    ->loadingIndicatorPosition('left')
                    ->panelLayout('integrated')
                    ->required(),
                Textarea::make('about')
                    ->required()
                    ->rows(10)
                    ->cols(20),
                Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        FileUpload::make('photo')->required()
                    ]),
                Repeater::make('benefits')
                    ->relationship('benefits')
                    ->schema([
                        TextInput::make('name')->required()
                    ]),
                Select::make('city_id')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('IDR')
                    ->required(),
                TextInput::make('duration')
                    ->numeric()
                    ->prefix('days')
                    ->required(),
                Select::make('is_open')
                    ->options([
                        true => 'open',
                        false => 'not_open'
                    ])
                    ->required(),
                Select::make('is_full_booked')
                    ->options([
                        true => 'not available',
                        false => 'avalaible'
                    ])
                    ->required(),
                TextInput::make('address')
                    ->required(),
            ]);
    }
}
