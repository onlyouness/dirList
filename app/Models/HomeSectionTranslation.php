<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSectionTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_section_id',
        'language_code',
        'header',
        'description',
        'short_title',
        'section_name',
    ];
}