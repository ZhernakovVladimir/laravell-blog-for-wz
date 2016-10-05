<?php

namespace App\Http\Middleware;

use Closure;
use App\StaticPage;
use Illuminate\Support\Facades\Request;
class StaticPagesIfPublished
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
        $req=Request::path();
        $static_page= StaticPage::where('name','=',$req)->firstOrFail();
        if(!($static_page->published)){return redirect('/');};
        return $next($request);
    }
}
