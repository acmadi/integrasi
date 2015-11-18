<?php namespace Sentinel\Middleware;

use Closure, Sentry;
use Illuminate\Contracts\Routing\Middleware;

class SentryAuth implements Middleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // dd(get_class(Sentry::check()));
        // echo "middle ware sentri no login";
        // dd(app('sentry'));


        if ( ! Sentry::check())
        {
        // dd(debug_backtrace());
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest(route('sentinel.login'));
            }
        }

        return $next($request);
	}

}
