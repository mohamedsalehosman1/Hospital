<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 1. To specify package’s class you are using

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Section extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $table = 'sections';
    protected $primarykey = 'id';
    public $translatedAttributes = ['name'];
    protected $fillable = ['name:ar' , 'name:en'];

    public function translat()
    {
        return $this->hasMany(SectionTranslation::class);
    }


}
