<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    protected $table = 'doctors';
    protected $primarykey = 'id';
    public $translatedAttributes = ['name','appointments'];

    /**
     * Get the doctors's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
