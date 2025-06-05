<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IsFaculty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Session::get('user_id');

        if(isset($userId)){

            $user = DB::table('users')
                ->where('id','=',$userId)
                ->where('is_active','=',1)
                ->where('admin_type','=',1)->first();

            $curriculums = DB::table('users as u')
                ->join('faculty as f','f.user_id','u.id')
                ->join('curriculums as cl','cl.faculty_id','f.id')
                ->where('f.user_id','=',$userId)
                ->get()
                ->toArray();
            if(count($curriculums) == 0){
                return redirect(route('admin-dashboard'));
            }
        }
        return $next($request);
    }
}
