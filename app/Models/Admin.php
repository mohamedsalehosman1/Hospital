<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable // استخدام Authenticatable لتمكين المصادقة
{
use HasFactory;

protected $fillable = [
'name',
'email',
'password',
];

// إذا كنت ترغب في تشفير كلمة المرور تلقائيًا عند حفظها
public function setPasswordAttribute($value)
{
$this->attributes['password'] = bcrypt($value);
}
}
