<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTranslation extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'location_id',
            'language_code',
            'location',
        ];
}