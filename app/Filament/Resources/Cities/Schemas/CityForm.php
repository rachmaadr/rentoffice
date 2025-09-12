<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->helperText("Masukan nama kota")
                    ->required()
                    ->maxLength(255),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('city')
                    ->preserveFilenames()
                    ->imagePreviewHeight('150')
                    ->required(),
            ]);
    }
}
