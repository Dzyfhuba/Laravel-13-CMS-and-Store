<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description_short',
        'description_long',
        'thumbnail',
        'carousel',
        'content',
        'tags',
        'related_projects',
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
