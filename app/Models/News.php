<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title', 'slug', 'news_type_id', 'image', 'description', 'content'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    public function type()
    {
        return $this->belongsTo(NewsType::class, 'news_type_id');
    }
}

