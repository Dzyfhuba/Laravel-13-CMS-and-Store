<?php

namespace App\Filament\Admin\Clusters\HomePageSetting\Pages;

use App\Filament\Admin\Clusters\HomePageSetting\HomePageSettingCluster;
use App\Models\HomePage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Livewire\Attributes\Renderless;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Str;

class AboutMe extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.clusters.home-page-setting.pages.about-me';

    protected static ?string $cluster = HomePageSettingCluster::class;

    protected static ?int $navigationSort = 2;

    public array $data = [];

    public function mount(): void
    {
        $data = HomePage::getGroup('about_me');

        $this->form->fill([
            'about_me__introduction' => $data['about_me__introduction']['value'] ?? '',
            'about_me__image' => $data['about_me__image']['value'] ?? '',
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                MarkdownEditor::make('about_me__introduction')
                    ->label(__('about_me.introduction'))
                    ->required(),
                FileUpload::make('about_me__image')
                    ->label(__('about_me.image'))
                    ->image()
                    ->required()
                    ->maxSize(5 * 1024) // 5MB
                    ->hint(__('about_me.look_at_home_page_onboarding')),
                TextEntry::make('about_me__full_name')
                    ->label(__('about_me.full_name'))
                    ->state(__('about_me.look_at_home_page_onboarding')),
                TextEntry::make('about_me__contact_me')
                    ->label(__('about_me.contact_me'))
                    ->state(__('about_me.look_at_home_page_onboarding')),
                TextEntry::make('about_me__portfolio')
                    ->label(__('about_me.portfolio'))
                    ->state(__('about_me.look_at_home_page_onboarding')),
            ])
            ->statePath('data');
    }

    #[ExposedLivewireMethod()]
    #[Renderless()]
    public function submit(): void
    {
        $this->validate();

        HomePage::set('about_me__introduction', $this->data['about_me__introduction']);

        $imageState = $this->data['about_me__image'] ?? null;
        $imageState = is_array($imageState) ? $imageState : [$imageState];
        $image = collect($imageState)->first(
            fn(mixed $file): bool => $file instanceof TemporaryUploadedFile,
        );

        if ($image instanceof TemporaryUploadedFile) {

            $newNameFile = Str::ulid()->toString() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('', $newNameFile);
            HomePage::set('about_me__image', $newNameFile);
        }

        Notification::make()
            ->title(__('global.record_saved', ['record' => __('about_me.about_me')]))
            ->success()
            ->send();
    }
}
