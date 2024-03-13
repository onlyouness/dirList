<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationTranslation extends Model
{
    use HasFactory;
    protected $fillable = ["naivigation_id", "language_code", "navbar"];
}