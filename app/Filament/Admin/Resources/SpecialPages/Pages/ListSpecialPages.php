<?php

namespace App\Filament\Admin\Resources\SpecialPages\Pages;

use App\Filament\Admin\Resources\SpecialPages\SpecialPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpecialPages extends ListRecords
{
    protected static string $resource = SpecialPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
