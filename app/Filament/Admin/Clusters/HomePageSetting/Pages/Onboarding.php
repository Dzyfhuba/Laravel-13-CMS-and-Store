<?php

namespace App\Filament\Admin\Clusters\HomePageSetting\Pages;

use App\Filament\Admin\Clusters\HomePageSetting\HomePageSettingCluster;
use App\Models\HomePage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class Onboarding extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.clusters.home-page-setting.pages.onboarding';
    protected static ?string $cluster = HomePageSettingCluster::class;

    public array $data = [];

    // mount
    public function mount(): void
    {
        $data = HomePage::getGroup('onboarding');
        // $this->data = [
        //     'full_name' => $data['onboarding__full_name'] ?? null,
        //     'profession' => $data['onboarding__profession'] ?? null,
        //     'resume' => $data['onboarding__resume'] ?? null,
        //     'message' => $data['onboarding__message'] ?? null,
        //     'photo' => $data['onboarding__photo'] ?? null,
        // ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->default(fn() => "test")
                    ->hint(fn() => $this->data['full_name']['hint'] ?? null),
                TextInput::make('profession')
                    ->required()
                    ->hint(fn() => $this->data['profession']['hint'] ?? null),
                Textarea::make('resume')->required()
                    ->maxLength(200)
                    ->hint(fn() => $this->data['resume']['hint'] ?? null),
                TextInput::make('message')
                    ->required()
                    ->maxLength(40)
                    ->hint(fn() => $this->data['message']['hint'] ?? null),
                FileUpload::make('photo')
                    ->image()
                    // ->required()
                    ->hint(fn() => $this->data['photo']['hint'] ?? null),
            ])
            ->statePath('data');
    }

    #[ExposedLivewireMethod]
    #[Renderless]
    public function submit(): void
    {
        $this->validate();
        dd($this->data);

        HomePage::set('onboarding__full_name', $this->data['full_name'], $this->data['full_name']['hint'] ?? null, 1);
        HomePage::set('onboarding__profession', $this->data['profession'], $this->data['profession']['hint'] ?? null, 2);
        HomePage::set('onboarding__resume', $this->data['resume'], $this->data['resume']['hint'] ?? null, 3);
        HomePage::set('onboarding__message', $this->data['message'], $this->data['message']['hint'] ?? null, 4);
        HomePage::set('onboarding__photo', $this->data['photo'], $this->data['photo']['hint'] ?? null, 5);

        $this->notify('success', 'Onboarding settings updated successfully.');
    }
}
