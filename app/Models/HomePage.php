<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/*
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $hint
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class HomePage extends Model
{
    protected $table = "home_page";

    protected $fillable = [
        'key',
        'value',
        'hint',
    ];

    public static function set(string $key, string|array $value, string $hint = null, ?int $sortOrder = null, ?string $image = null): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => is_array($value) ? json_encode($value) : $value, 'hint' => $hint, 'sort_order' => $sortOrder, 'image' => $image]
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

    public static function getGroupValue(string $key = ""): ?array
    {
        $group = null;
        if (empty($key)) {
            $group = static::query()->orderBy('sort_order', 'asc')->pluck('value', 'key');
        } else {
            $group = static::query()->where('key', 'like', "{$key}__%")->orderBy('sort_order', 'asc')->pluck('value', 'key');
        }
        return $group->toArray();
    }

    public static function getValueWithoutGroup(string $key): ?string
    {
        $homePage = static::where('key', 'like', "{$key}__%")->first();

        return Str::substrReplace($homePage?->value, '', 0, strlen("{$key}__"));
    }
}
