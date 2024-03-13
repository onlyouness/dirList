<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $fillable=[
        'location','status','icon','image','slug'
    ];

    public function getTranslatedLocationAttribute()
    {
        if ($this->translation?->location) {
            return $this->translation->location;
        }
        return $this->location;
    }

    public function listings(){
        return $this->hasMany(Listing::class);
    }


    public function translation($language = null)
    {
        if (!$language) {
            $language = getSessionLanguage();
        }

        return $this->hasOne(LocationTranslation::class, 'location_id', 'id')->where('language_code', '=', $language);
    }

    public function translations()
    {
        return $this->hasMany(LocationTranslation::class);
    }

}