<?php

namespace App\Filament\Resources\LogcustomerResource\Pages;

use App\Filament\Resources\LogcustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogcustomer extends EditRecord
{
    protected static string $resource = LogcustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
