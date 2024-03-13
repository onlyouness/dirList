<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'listing_id',
        'language_code',
        'title',
        'address',
        'sort_description',
        'description',
        'seo_title',
        'seo_description',
    ];
}