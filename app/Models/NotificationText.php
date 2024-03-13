<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationText extends Model
{
    use HasFactory;
    protected $fillable = [
        "default_text",
        "custom_text",
        "language_code"
    ];
    public function getTranslatedCustomText(){
        $code = getSessionLanguage();
        $translate = self::where([
            "default_text" => $this->default_text,
            "language_code" => $code,
        ])->first();
        if($translate){
            return $translate->custom_text;
        }
        return $this->custom_text;
        
    }
}