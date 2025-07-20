<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    protected $fillable = ['slug', 'title', 'content', 'meta', 'is_published'];

    public $translatable = ['title', 'content', 'meta'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
        'meta' => 'array',
    ];
}
