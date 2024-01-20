<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Partner extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function byLocale()
    {
        if (\App::getLocale() == "fr") {
            $this->content = $this->content_fr != null ? $this->content_fr : '';
        }

        return $this;

    }
}
