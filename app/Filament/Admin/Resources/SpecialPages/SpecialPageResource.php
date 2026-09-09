<?php

namespace App\Filament\Admin\Resources\SpecialPages;

use App\Filament\Admin\Resources\SpecialPages\Pages\CreateSpecialPage;
use App\Filament\Admin\Resources\SpecialPages\Pages\EditSpecialPage;
use App\Filament\Admin\Resources\SpecialPages\Pages\ListSpecialPages;
use App\Filament\Admin\Resources\SpecialPages\Schemas\SpecialPageForm;
use App\Filament\Admin\Resources\SpecialPages\Tables\SpecialPagesTable;
use App\Models\SpecialPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SpecialPageResource extends Resource
{
    protected static ?string $model = SpecialPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SpecialPage';

    public static function form(Schema $schema): Schema
    {
        return SpecialPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpecialPagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpecialPages::route('/'),
            'create' => CreateSpecialPage::route('/create'),
            'edit' => EditSpecialPage::route('/{record}/edit'),
        ];
    }
}
