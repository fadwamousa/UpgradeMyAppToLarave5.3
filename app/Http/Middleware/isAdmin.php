<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAdmin
{

  public function handle($request, Closure $next)
  {

    if(Auth::check()){ //if user is logged in

      if(Auth::user()->isAdmin()){
          return $next($request);
      }

    }
    return redirect('/');

  }
}
