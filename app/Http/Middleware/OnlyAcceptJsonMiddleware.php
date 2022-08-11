<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class OnlyAcceptJsonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
       // Verify if request is JSON
       
       $request->headers->set(
        'Accept', 'application/json',
        // 'Authorization', 'Bearer' .$accessToken,
       )
    //    ->body->set([
    //     'grant_type' => 'password',
    //     'client_id' => '2', 
    //     'client_secret' => 'GyNszv5EUB8thIcVBXpgBWvhi7ldciF9GO5oDZAE',
    //     'username' => 'sampler123@gmail.com',
    //      'password' => 'sampler123',
    //       'scope' => ''])
    ;
       return $next($request);
    }
}
