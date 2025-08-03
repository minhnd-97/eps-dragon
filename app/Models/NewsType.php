<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsType extends Model
{
    protected $fillable = ['name', 'slug'];

    // Optional: Automatically set slug when name is created
    public static function boot()
    {
        parent::boot();

        static::creating(function ($type) {
            $type->slug = Str::slug($type->name);
        });
    }
}

