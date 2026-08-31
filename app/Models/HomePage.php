<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = "home_page";

    protected $fillable = [
        'key',
        'value',
        'hint',
    ];

    public static function set(string $key, string $value, string $hint = null, ?int $sortOrder = null, ?string $image = null): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'hint' => $hint, 'sort_order' => $sortOrder, 'image' => $image]
        );
    }

    public static function get(string $key): ?string
    {
        $homePage = static::where('key', $key)->first();

        return $homePage?->value;
    }

    public static function getJson(string $key): ?array
    {
        $homePage = static::where('key', $key)->first();

        return $homePage?->value ? json_decode($homePage->value, true) : null;
    }

    public static function getGroup(string $key): ?array
    {
        $group = static::query()->where('key', 'like', "{$key}__%")->orderBy('sort_order', 'asc')->get()->keyBy('key');

        return $group->toArray();
    }
}
