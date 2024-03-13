<?php

namespace App\Models;

use App\Models\ListingTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $fillable=[
        'admin_id','user_id','listing_category_id','location_id','listing_package_id','title','latitude','longitude','views','address','phone','email','website','description','logo','thumbnail_image','facebook','twitter','linkedin','whatsapp','instagram','pinterest','tumblr','youtube','is_featured','verified','status','user_type','slug','seo_title','seo_description','sort_description','file','banner_image'
    ];

    public function getTranslatedTitleAttribute()
    {
        if ($this->translation?->title) {
            return $this->translation->title;
        }
        return $this->title;
    }

    public function getTranslatedAddressAttribute()
    {
        if ($this->translation?->address) {
            return $this->translation->address;
        }
        return $this->address;
    }

    public function getTranslatedSortDescriptionAttribute()
    {
        if ($this->translation?->sort_description) {
            return $this->translation->sort_description;
        }
        return $this->sort_description;
    }

    public function getTranslatedDescriptionAttribute()
    {
        if ($this->translation?->description) {
            return $this->translation->description;
        }
        return $this->description;
    }


    // public function listingCategory(){
    //     return $this->belongsTo(ListingCategory::class);
    // }

    // public function listingAminities(){
    //     return $this->hasMany(ListingAminity::class);
    // }
    // public function listingImages(){
    //     return $this->hasMany(ListingImage::class);
    // }
    // public function listingVideos(){
    //     return $this->hasMany(ListingVideo::class);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function admin(){
    //     return $this->belongsTo(Admin::class);
    // }

    // public function listingSchedule(){
    //     return $this->hasMany(ListingSchedule::class);
    // }

    // public function reviews(){
    //     return $this->hasMany(ListingReview::class);
    // }

    public function location(){
        return $this->belongsTo(Location::class);
    }



    // public function claimeLists(){
    //     return $this->hasMany(ListingClaime::class);
    // }

    public function translation($language = null)
    {
        if (!$language) {
            $language = getSessionLanguage();
        }

        return $this->hasOne(ListingTranslation::class, 'listing_id', 'id')->where('language_code', '=', $language);
    }

    public function translations()
    {
        return $this->hasMany(ListingTranslation::class);
    }
}