<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $thumbnail
 * @property array $carousel
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class SpecialPage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'thumbnail',
        'carousel',
        'content',
    ];

    protected function casts(): array
    {
        return [
            'carousel' => 'array',
        ];
    }
}
