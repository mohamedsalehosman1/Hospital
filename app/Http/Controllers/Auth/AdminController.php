<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // استيراد Request الصحيح
use Illuminate\Support\Facades\Auth; // استيراد Auth أيضًا

class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('admin.login'); // تأكد من وجود ملف Blade هنا
    }


    protected function guard()
    {
        return Auth::guard('admins');
    }
    // public function logout()
    // {
    //     Auth::guard('admins')->logout();
    //     return redirect('/'); // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
    // }

    protected function redirectTo()
    {
        return route('admin.dashboard');
    }
}
