<?php

namespace App\Helpers;

class Str extends \Illuminate\Support\Str {
    public static function alphaIndex($index) {
        $alphabet = range('A', 'Z');
        return $alphabet[$index];
    }
}
