<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('booking_trx_id')->label('Kode Booking')->maxLength(255)->required(),
                TextInput::make('phone_number')->numeric()->maxLength(12)->required(),
                TextInput::make('total_amount')->numeric()->prefix('IDR')->required(),
                TextInput::make('duration')->numeric()->prefix('Days')->required(),
                DatePicker::make('started_at')->required(),
                DatePicker::make('ended_at')->required(),
                Select::make('is_paid')->options([
                    true => 'Paid',
                    false => 'Not Paid'
                ])->required(),
                Select::make('office_space_id')
                    ->relationship('officeSpace', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
            ]);
    }
}
