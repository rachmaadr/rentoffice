<?php

namespace App\Filament\Resources\OfficeSpaces\Schemas;

use Filament\Forms\Components\FileUpload;
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
                    ->visibility('public')
                    ->preserveFilenames()
                    ->disk('public')
                    ->imagePreviewHeight('150') // Tambahkan ini
                    ->loadingIndicatorPosition('left')
                    ->panelLayout('integrated')
                    ->required(),
                
            ]);
    }
}
