<?php

namespace App\Filament\Admin\Clusters\HomePageSetting\Pages;

use App\Filament\Admin\Clusters\HomePageSetting\HomePageSettingCluster;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class Onboarding extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.clusters.home-page-setting.pages.onboarding';
    protected static ?string $cluster = HomePageSettingCluster::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
            ])
            ->statePath('data');
    }

}
