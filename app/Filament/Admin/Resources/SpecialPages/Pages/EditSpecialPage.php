<?php

namespace App\Filament\Admin\Resources\SpecialPages\Pages;

use App\Filament\Admin\Resources\SpecialPages\SpecialPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSpecialPage extends EditRecord
{
    protected static string $resource = SpecialPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
