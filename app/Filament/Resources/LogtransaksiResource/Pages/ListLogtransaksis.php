<?php

namespace App\Filament\Resources\LogtransaksiResource\Pages;

use App\Filament\Resources\LogtransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogtransaksis extends ListRecords
{
    protected static string $resource = LogtransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
