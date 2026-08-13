<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
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
