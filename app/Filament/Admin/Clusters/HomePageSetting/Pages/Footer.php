<?php

namespace App\Filament\Admin\Clusters\HomePageSetting\Pages;

use App\Filament\Admin\Clusters\HomePageSetting\HomePageSettingCluster;
use App\Models\HomePage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Components\Attributes\ExposedLivewireMethod;
use Livewire\Attributes\Renderless;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Str;

class Footer extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.admin.clusters.home-page-setting.pages.about-me';

    protected static ?string $cluster = HomePageSettingCluster::class;

    protected static ?int $navigationSort = 2;

    public array $data = [];

    public function mount(): void
    {
        $data = HomePage::getGroup('footer');

        $this->form->fill([
            'footer__resume' => $data['footer__resume']['value'] ?? '',
            'footer__github_username' => $data['footer__github_username']['value'] ?? '',
            'footer__github_url' => $data['footer__github_url']['value'] ?? '',
            'footer__linkedin_username' => $data['footer__linkedin_username']['value'] ?? '',
            'footer__linkedin_url' => $data['footer__linkedin_url']['value'] ?? '',
            'footer__youtube_username' => $data['footer__youtube_username']['value'] ?? '',
            'footer__youtube_url' => $data['footer__youtube_url']['value'] ?? '',
            'footer__tiktok_username' => $data['footer__tiktok_username']['value'] ?? '',
            'footer__tiktok_url' => $data['footer__tiktok_url']['value'] ?? '',
            'footer__instagram_username' => $data['footer__instagram_username']['value'] ?? '',
            'footer__instagram_url' => $data['footer__instagram_url']['value'] ?? '',
            'footer__facebook_username' => $data['footer__facebook_username']['value'] ?? '',
            'footer__facebook_url' => $data['footer__facebook_url']['value'] ?? '',
            'footer__email' => $data['footer__email']['value'] ?? '',
            'footer__phone' => $data['footer__phone']['value'] ?? '',
            'footer__location' => $data['footer__location']['value'] ?? '',
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                MarkdownEditor::make('footer__resume')
                    ->label(__('footer.resume'))
                    ->required(),
                Grid::make()
                    ->columns([
                        'sm' => 1,
                        'lg' => 2,
                    ])
                    ->schema([
                        TextInput::make('footer__github_username')
                            ->label(__('footer.github_username'))
                            ->required(),
                        TextInput::make('footer__github_url')
                            ->label(__('footer.github_url'))
                            ->required(),
                        TextInput::make('footer__linkedin_username')
                            ->label(__('footer.linkedin_username'))
                            ->required(),
                        TextInput::make('footer__linkedin_url')
                            ->label(__('footer.linkedin_url'))
                            ->required(),
                        TextInput::make('footer__youtube_username')
                            ->label(__('footer.youtube_username'))
                            ->required(),
                        TextInput::make('footer__youtube_url')
                            ->label(__('footer.youtube_url'))
                            ->required(),
                        TextInput::make('footer__tiktok_username')
                            ->label(__('footer.tiktok_username'))
                            ->required(),
                        TextInput::make('footer__tiktok_url')
                            ->label(__('footer.tiktok_url'))
                            ->required(),
                        TextInput::make('footer__instagram_username')
                            ->label(__('footer.instagram_username'))
                            ->required(),
                        TextInput::make('footer__instagram_url')
                            ->label(__('footer.instagram_url'))
                            ->required(),
                        TextInput::make('footer__facebook_username')
                            ->label(__('footer.facebook_username'))
                            ->required(),
                        TextInput::make('footer__facebook_url')
                            ->label(__('footer.facebook_url'))
                            ->required(),
                    ]),
                TextInput::make('footer__email')
                    ->label(__('footer.email'))
                    ->required(),
                TextInput::make('footer__phone')
                    ->label(__('footer.phone'))
                    ->required(),
                TextInput::make('footer__location')
                    ->label(__('footer.location'))
                    ->required(),
            ])
            ->statePath('data');
    }

    #[ExposedLivewireMethod()]
    #[Renderless()]
    public function submit(): void
    {
        $this->validate();

        HomePage::set('footer__resume', $this->data['footer__resume']);
        HomePage::set('footer__github_username', $this->data['footer__github_username']);
        HomePage::set('footer__github_url', $this->data['footer__github_url']);
        HomePage::set('footer__linkedin_username', $this->data['footer__linkedin_username']);
        HomePage::set('footer__linkedin_url', $this->data['footer__linkedin_url']);
        HomePage::set('footer__youtube_username', $this->data['footer__youtube_username']);
        HomePage::set('footer__youtube_url', $this->data['footer__youtube_url']);
        HomePage::set('footer__tiktok_username', $this->data['footer__tiktok_username']);
        HomePage::set('footer__tiktok_url', $this->data['footer__tiktok_url']);
        HomePage::set('footer__instagram_username', $this->data['footer__instagram_username']);
        HomePage::set('footer__instagram_url', $this->data['footer__instagram_url']);
        HomePage::set('footer__facebook_username', $this->data['footer__facebook_username']);
        HomePage::set('footer__facebook_url', $this->data['footer__facebook_url']);
        HomePage::set('footer__email', $this->data['footer__email']);
        HomePage::set('footer__phone', $this->data['footer__phone']);
        HomePage::set('footer__location', $this->data['footer__location']);

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
