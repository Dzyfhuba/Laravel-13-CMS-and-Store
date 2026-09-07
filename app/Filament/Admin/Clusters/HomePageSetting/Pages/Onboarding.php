<?php

namespace App\Filament\Admin\Clusters\HomePageSetting\Pages;

use App\Filament\Admin\Clusters\HomePageSetting\HomePageSettingCluster;
use App\Models\HomePage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Str;

class Onboarding extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.clusters.home-page-setting.pages.onboarding';

    protected static ?string $cluster = HomePageSettingCluster::class;

    protected static ?int $navigationSort = 1;

    public array $data = [];

    // mount
    public function mount(): void
    {
        $data = HomePage::getGroup('onboarding');

        // Map the data to the expected structure for the form
        $this->form->fill([
            'full_name' => $data['onboarding__full_name']['value'],
            'profession' => $data['onboarding__profession']['value'],
            'resume' => $data['onboarding__resume']['value'],
            'message' => $data['onboarding__message']['value'],
            'photo' => $data['onboarding__photo']['value'] ?? null,
            'contact_me' => $data['onboarding__contact_me']['value'] ?? null,
            'portfolio' => $data['onboarding__portfolio']['value'] ?? null,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->default(fn () => 'test')
                    ->label(__('onboarding.full_name'))
                    ->hint(fn () => __('onboarding.enter_your_full_name')),
                TextInput::make('profession')
                    ->required()
                    ->label(__('onboarding.profession'))
                    ->hint(__('onboarding.enter_your_profession')),
                Textarea::make('resume')->required()
                    ->maxLength(200)
                    ->label(__('onboarding.resume'))
                    ->hint(__('onboarding.enter_your_resume_max_200_characters')),
                TextInput::make('message')
                    ->required()
                    ->maxLength(40)
                    ->label(__('onboarding.message'))
                    ->hint(__('onboarding.enter_your_message_max_40_characters_can_be_used_for_motto_or_tagline')),
                FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->label(__('onboarding.photo'))
                    ->hint(__('onboarding.upload_your_photo')),
                TextInput::make('contact_me')
                    ->required()
                    ->label(__('onboarding.contact_me'))
                    ->hint(__('onboarding.enter_your_contact_link_whatsapp_or_email')),
                TextInput::make('portfolio')
                    ->required()
                    ->label(__('onboarding.portfolio'))
                    ->hint(__('onboarding.enter_your_portfolio_link')),
            ])
            ->statePath('data');
    }

    #[ExposedLivewireMethod]
    #[Renderless]
    public function submit(): void
    {
        $this->validate();

        HomePage::set('onboarding__full_name', $this->data['full_name']);
        HomePage::set('onboarding__profession', $this->data['profession']);
        HomePage::set('onboarding__resume', $this->data['resume']);
        HomePage::set('onboarding__message', $this->data['message']);
        HomePage::set('onboarding__contact_me', $this->data['contact_me']);
        HomePage::set('onboarding__portfolio', $this->data['portfolio']);

        // Upload File
        // Move temporary uploaded photo to the desired location and save the path
        if (array_values($this->data['photo'])[0] !== $this->form->getState()['photo']) {
            $photo = null; // must be Livewire\Features\SupportFileUploads\TemporaryUploadedFile
            foreach ($this->data['photo'] as $file) {
                if ($file instanceof TemporaryUploadedFile) {
                    $photo = $file;
                    break;
                }
            }

            if ($photo === null) {
                Notification::make()
                    ->title(__('global.record_not_saved', ['record' => __('onboarding.onboarding')]))
                    ->danger()
                    ->send();

                return;
            }

            $newNameFile = Str::ulid()->toString().'.'.$photo->getClientOriginalExtension();
            $photo->storePubliclyAs('', $newNameFile);
            HomePage::set('onboarding__photo', $newNameFile);
        }

        Notification::make()
            ->title(__('global.record_saved', ['record' => __('onboarding.onboarding')]))
            ->success()
            ->send();
    }
}
