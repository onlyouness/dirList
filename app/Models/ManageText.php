<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageText extends Model
{
    use HasFactory;
    protected $table = "manage_texts";
    protected $fillable = [
        'default_text',
        "custom_text",
        "language_code"
    ];
    public function getTranslatedCustomTextAttribute(){
        $code = getSessionLanguage();
        $translation = self::where([
            "default_text" => $this->default_text,
            "language_code"=> $code,
        ])->first();
        if($translation){
            return $translation->custom_text;
        }
         return $this->custom_text;
    }
    
   
}