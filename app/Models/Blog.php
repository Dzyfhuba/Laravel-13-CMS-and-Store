<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;


/*
 * @property int $id
 * @property string $name
 * @property string $description_short
 * @property string $description_long
 * @property string $thumbnail
 * @property array<int, string> $carousel
 * @property string $content
 * @property array<int, string> $tags
 * @property array<int, int> $related_projects
 * @property array<int, int> $related_products
 * @property array<int, int> $related_services
 * @property array<int, int> $related_blogs
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Blog extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description_short',
        'description_long',
        'thumbnail',
        'carousel',
        'content',
        'tags',
        'related_projects',
        'related_products',
        'related_services',
        'related_blogs',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function casts(): array
    {
        return [
            'carousel' => 'array',
            'tags' => 'array',
            'related_projects' => 'array',
            'related_products' => 'array',
            'related_services' => 'array',
            'related_blogs' => 'array',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $slug = Str::slug($project->name);
            $count = static::where('slug', 'like', "{$slug}%")
                ->lockForUpdate()
                ->count();

            $project->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

}
