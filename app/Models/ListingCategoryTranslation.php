<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'listing_category_id',
        'language_code',
        'name',
    ];
}
