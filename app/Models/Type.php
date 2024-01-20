<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
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
        }

        return $this;

    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
