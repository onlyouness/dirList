<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('getSessionLanguage')) {
    function getSessionLanguage(): string
    {
        // Session::forget("lang");
        if (!Session::has('lang')) {
            $lang = Session::put('lang', config('app.locale'));
            session()->forget('text_direction');
            session()->put('text_direction', 'ltr');
        }

        $lang = Session::get('lang');

        return $lang;
    }
    function slugify($string) {
        // Convert the string to lowercase
        $string = strtolower($string);
    
        // Replace spaces with hyphens
        $string = str_replace(' ', '-', $string);
    
        // Remove special characters using regex
        $string = preg_replace('/[^a-z0-9\-]/', '', $string);
    
        // Remove consecutive hyphens
        $string = preg_replace('/-+/', '-', $string);
    
        // Remove hyphens at the beginning and end
        $string = trim($string, '-');
    
        return $string;
    }
}