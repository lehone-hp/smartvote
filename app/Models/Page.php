<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    public function byLocale()
    {
        if (\App::getLocale() == "fr") {
            $this->title = $this->title_fr != null ? $this->title_fr : '';
            $this->content = $this->content_fr != null ? $this->content_fr : '';
        }

        return $this;

    }
}
