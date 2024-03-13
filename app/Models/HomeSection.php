<?php

namespace App\Models;

use App\Models\HomeSectionTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeSection extends Model
{
    use HasFactory;
    protected $table = "home_sections";
    protected $fillable = ["header", "description", "show_homepage", "section_name", "content_quantity", "short_title"];

    public function translation($language = null)
    {
        if (!$language) {
            $language = getSessionLanguage();
        }
        return $this->hasOne(HomeSectionTranslation::class, "home_section_id", "id")->where("language_code", "=", $language);


    }
    public function translations()
    {
        return $this->hasMany(HomeSectionTranslation::class);
    }
    public function getTranslatedSectionNameAttribute()
    {
        if ($this->translation) {
            return $this->translation->section_name;
        }
        return $this->title;
    }
    public function getTranslatedHeaderAttribute()
    {
        if ($this->translation) {
            return $this->translation->header;
        }
        return $this->header;
    }
    public function getTranslatedDescriptionAttribute()
    {
        if ($this->translation) {
            return $this->translation->description;
        }
        return $this->description;
    }
    
    public function getTranslatedShortTitleAttribute()
    {
        if ($this->translation) {
            return $this->translation->short_title;
        }
        return $this->short_title;
    }

}