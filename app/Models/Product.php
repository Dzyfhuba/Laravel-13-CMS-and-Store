<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
 * @property int $id
 * @property string $name
 * @property string $description_short
 * @property string $description_long
 * @property string $thumbnail
 * @property array $carousel
 * @property string $content
 * @property array $tags
 * @property array $related_projects
 * @property array $related_products
 * @property array $related_services
 * @property array $related_blogs
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
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

        // static::creating(function ($project) {
        //     dd($project);
        // });
    }

}
