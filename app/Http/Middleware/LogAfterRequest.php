<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogRequestsResponse;
use Facade\FlareClient\Http\Response;

class LogAfterRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function termainate(Request $request,Response $response)
    {
        $url = $request->fullUrl();
        $ip = $request->ip();
        $r = new LogRequestsResponse();
        $r->ip = $ip;
        $r->url = $url;
        $r->request = json_encode($request->all());
        $r->response = $response;
        $r->save();
    }
}
