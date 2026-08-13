<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->columnSpanFull(),
                TextInput::make('description_short'),
                TextInput::make('description_long'),
                FileUpload::make('thumbnail')->image(),
                Repeater::make('carousel')
                    ->columnSpanFull()
                    ->schema([
                        Tabs::make('carousel_tab')
                            ->activeTab(function (Get $get) {
                                // Ambil nilai 'embedded_video_url' khusus untuk item repeater saat ini
                                $videoUrl = $get('embedded_video_url');

                                // Jika ada URL video, aktifkan tab ke-2 (video), jika tidak aktifkan tab ke-1 (image)
                                return filled($videoUrl) ? 2 : 1;
                            })
                            ->tabs([
                                Tab::make('image')->schema([
                                    FileUpload::make('image_file')->image()
                                ]),
                                Tab::make('video')->schema([
                                    TextInput::make('embedded_video_url')
                                        ->live(onBlur: true),
                                    TextEntry::make('video_preview')
                                        ->label('Pratinjau Video')
                                        ->state(function ($get) {
                                            $url = $get('embedded_video_url');

                                            if (!$url) {
                                                return 'Masukkan URL video di atas untuk melihat pratinjau.';
                                            }

                                            // Ubah URL YouTube standar menjadi URL Embed
                                            if (str_contains($url, 'youtube.com/watch?v=')) {
                                                $url = str_replace('watch?v=', 'embed/', $url);
                                            } elseif (str_contains($url, 'youtu.be/')) {
                                                $url = str_replace('youtu.be/', 'youtube.com/embed/', $url);
                                            }

                                            return new HtmlString("
                                            <div style='position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 0.5rem;'>
                                                <iframe
                                                    src='{$url}'
                                                    style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;'
                                                    allowfullscreen>
                                                </iframe>
                                            </div>
                                        ");
                                        }),
                                ]),
                            ]),
                    ]),
                TagsInput::make('tags'),
            ]);
    }
}
