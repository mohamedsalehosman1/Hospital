<?php
// app/Models/SectionTranslation.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];


}
