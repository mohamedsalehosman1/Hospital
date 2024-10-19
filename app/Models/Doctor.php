<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements TranslatableContract ,  HasMedia
{
    use InteractsWithMedia;

    use HasFactory;
    use Translatable;
    protected $table = 'doctors';
    protected $primarykey = 'id';
    protected $fillable = ['name:ar','name:en', 'email', 'password', 'phone', 'section_id', 'price', 'photo'];

    public $translatedAttributes = ['name'];
protected $guarded=[];
    /**
     * Get the doctors's image.
     */
    public function getImage()
    {
        return $this->getFirstMediaUrl('image');
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
