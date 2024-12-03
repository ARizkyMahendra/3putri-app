<?php

namespace App\Filament\Resources\LogcustomerResource\Pages;

use App\Filament\Resources\LogcustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogcustomers extends ListRecords
{
    protected static string $resource = LogcustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
