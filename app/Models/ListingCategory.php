<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCategory extends Model
{
    use HasFactory;
    protected $table="listing_categories";
    protected $fillable=[
        'name','icon','image','status','icon_image','slug'
    ];


    public function translation($language = null){
        if(!$language){
            $language = getSessionLanguage();
        }
        return $this->hasOne(ListingCategoryTranslation::class,"listing_category_id","id")->where("language_code","=",$language);

    }
    
    public function translations()
    {
        return $this->hasMany(ListingCategoryTranslation::class);
    }
    public function listings(){
        return $this->hasMany(Listing::class);
    }
    public function getTranslatedNameAttribute(){
        if($this->translation){
            return $this->translation->name;
        }
        return $this->name;
    }
}
