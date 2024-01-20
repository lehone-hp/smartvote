<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function byLocale()
    {
        if (\App::getLocale() == "fr") {
            $this->title = $this->title_fr != null ? $this->title_fr : '';
            $this->content = $this->content_fr != null ? $this->content_fr : '';
        }

        return $this;

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
