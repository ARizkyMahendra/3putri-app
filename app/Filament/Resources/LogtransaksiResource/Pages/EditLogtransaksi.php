<?php

namespace App\Filament\Resources\LogtransaksiResource\Pages;

use App\Filament\Resources\LogtransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogtransaksi extends EditRecord
{
    protected static string $resource = LogtransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
