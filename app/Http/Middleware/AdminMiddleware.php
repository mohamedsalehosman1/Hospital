<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق مما إذا كان المستخدم مسجلاً كإداري
        if (!Auth::guard('admins')->check()) {
            return redirect('admin/login')->withErrors(['message' => 'يجب تسجيل الدخول كإداري للوصول إلى هذه الصفحة.']);
        }

        return $next($request);
    }
}
