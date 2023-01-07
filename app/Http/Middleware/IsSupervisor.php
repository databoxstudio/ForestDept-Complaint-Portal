<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class IsSupervisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty($request->user()) && $request->user()->role !=User::SUPERVISOR){
            $response['success'] = false;     $response['message'] = "Unauthorized access";
            return response()->json($response, 401); 
        
        }
        return $next($request);
    }
}
