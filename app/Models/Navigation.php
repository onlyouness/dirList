<?php

namespace App\Models;

use App\Models\NavigationTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Navigation extends Model
{
    use HasFactory;
    protected $table = "navigations";
    protected $fillable = [
        "name",
        "navbar",
        "status"
    ];
    public function getTranslatedNavbarAttribute()
    {
        if ($this->translation) {
            return $this->translation->navbar;
        }
        ;
        return $this->navbar;
    }
    public function translation($language = null)
    {
        if (!$language) {
            $language = getSessionLanguage();
        }
        return $this->hasOne(NavigationTranslation::class, 'navigation_id', 'id')->where('language_code', "=", $language);
    }
    public function translations()
    {
        return $this->hasMany(NavigationTranslation::class);
    }

}