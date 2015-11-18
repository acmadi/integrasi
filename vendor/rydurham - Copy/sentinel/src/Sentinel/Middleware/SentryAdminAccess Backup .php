<?php namespace Sentinel\Middleware;

use Closure, Session, Sentry;
use Illuminate\Contracts\Routing\Middleware;

class SentryAdminAccess implements Middleware {

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // First make sure there is an active session
        // dd(debug_print_backtrace(2));

        // dd(Sentry::check());
        if ( ! Sentry::check())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest(route('sentinel.login'));
            }
        }

        // Now check to see if the current user has the 'admin' permission
         // dd(get_class(Sentry::getUser()));
         // dd(Sentry::getUser()->hasAccess('admin'));//Sentinel\Models\User

        if ( ! Sentry::getUser()->hasAccess('admin'))
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                Session::flash('error', trans('Sentinel::users.noaccess'));
                return redirect()->route('sentinel.login');
            }

        }
        // dd(Sentry::getUser()->hasAccess('admin'));
        // dd(Sentry::getId());
        // dd(Sentry::getGroups());

        // All clear - we are good to move forward
        return $next($request);
	}

}
