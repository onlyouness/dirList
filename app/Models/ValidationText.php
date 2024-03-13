<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidationText extends Model
{
    use HasFactory;
    protected $fillable = ["default_text", "custom_text", "language_code"];
    public function getTranslatedCustomTextAtrribute(){
        $code = getSessionLanguage();
        $translation = self::where([
            "default_text" => $this->default_text,
            "language_code" => $code
        ])->first();
        if($translation){
            return $translation->custom_text;
        }
        return $this->custom_text;
    }
}